<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RoutesImport;
use App\Models\Route;
use Maatwebsite\Excel\Facades\Excel;

class RouteController extends Controller
{
    public function indexAddRoutes()
    {
        if (session('validRows') || session('invalidRows') || session('duplicatedRows')) {
            session()->put('validRows');
            session()->put('invalidRows');
            session()->put('duplicatedRows');
            session()->put('orderRows');
            session()->put('colors');
        } else {
            session(['validRows' => []]);
            session(['invalidRows' => []]);
            session(['duplicatedRows' => []]);
            session(['orderRows' => []]);
            session(['colors' => []]);
        }

        return view('admin.route.route', [
            'validRows' => session('validRows'),
            'invalidRows' => session('invalidRows'),
            'duplicatedRows' => session('duplicatedRows'),
            'orderRows' => session('orderRows'),
            'colors' => session('colors')
        ]);
    }

    public function indexRoutes()
    {
        return view('admin.route.route', [
            'validRows' => session('validRows'),
            'invalidRows' => session('invalidRows'),
            'duplicatedRows' => session('duplicatedRows'),
            'orderRows' => session('orderRows'),
            'colors' => session('colors')
        ]);
    }

    public function routeCheck(Request $request)
    {

        //Validar el archivo general
        $messages = makeMessages();
        $this->validate($request, [
            'document' => ['required', 'max:5120', 'mimes:xlsx'],
        ], $messages);

        //Validar el archivo excel en detalle
        if ($request->hasFile('document')) {
            $file = request()->file('document');

            $import = new RoutesImport();
            Excel::import($import, $file);

            // Obtener filas válidas e inválidas
            $validRows = $import->getValidRows();
            $invalidRows = $import->getInvalidRows();
            $duplicatedRows = $import->getDuplicatedRows();
            $orderRows = $import->getOrderRows();
            $colors = $import->getColors();
            // dd($validRows, $invalidRows, $duplicatedRows);

            // Agregar o actualizar las filas en la base de datos
            foreach ($validRows as $row) {
                $origin = $row['origen'];
                $destination = $row['destino'];

                // Verifica si la fila ya existe en la base de datos
                $route = Route::where('origin', $origin)
                    ->where('destination', $destination)
                    ->first();

                if ($route) {
                    // Si existe, realiza una actualización
                    $route->update([
                        'seats' => $row['cantidad_de_asientos'],
                        'base_value' => $row['tarifa_base'],
                    ]);
                } else {
                    // Si no existe, inserta un nuevo viaje a la base de datos
                    Route::create([
                        'origin' => $origin,
                        'destination' => $destination,
                        'seats' => $row['cantidad_de_asientos'],
                        'base_value' => $row['tarifa_base'],
                    ]);
                }
            }

            //Eliminar registros (filas) vacios del  documento excel
            $invalidRows = array_filter($invalidRows, function ($invalidrow) {
                return $invalidrow['origen'] !== null || $invalidrow['destino'] !== null || $invalidrow['cantidad_de_asientos'] !== null || $invalidrow['tarifa_base'] !== null;
            });


            session()->put('validRows', $validRows);
            session()->put('invalidRows', $invalidRows);
            session()->put('duplicatedRows', $duplicatedRows);
            session()->put('orderRows', $orderRows);
            session()->put('colors', $colors);


            return redirect()->route('routesAdd.index');
        }
    }

    public function getOrigins()
    {
        $origins = Route::distinct()->orderBy('origin', 'asc')->pluck('origin');
        return response()->json([
            'origins' => $origins,
        ]);
    }

    public function getDestinations($origin)
    {
        $destinations = Route::where('origin', $origin)->orderBy('destination', 'asc')->pluck('destination');
        return response()->json([
            'destinations' => $destinations,
        ]);
    }

    public function welcomeIndex()
    {
        $travels = Route::get()->count();
        return view('welcome', [
            'travelsAmount' => $travels, // travelsAmount es la variable que contiene la cantidad de viajes
        ]);
    }
}
