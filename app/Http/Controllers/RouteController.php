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
        // $messages = makeMessages();

        // Validacion general del archivo
        $this->validate($request, [
            'document' => ['required', 'max:5120', 'mimes:xlsx'],
        ]); // Como segundo parametro se pasa la variable $messages para los mensajes de errores.

        //Validacion en detalle del archivo
        if ($request->hasFile('document')) {
            $file = request()->file('document');

            $import = new RoutesImport();
            Excel::import($import, $file);

            $validRows = $import->getValidRows();
            $invalidRows = $import->getInvalidRows();
            $duplicatedRows = $import->getDuplicatedRows();
            $orderRows = $import->getOrderRows();
            $colors = $import->getColors();
            //dd($validRows, $invalidRows, $duplicatedRows, $orderRows, $colors);

            foreach ($validRows as $row) {
                $origin = $row['origen'];
                $destination = $row['destino'];

                $route = Route::where('origin', $origin)
                    ->where('destination', $destination)
                    ->first();

                if ($route) {
                    $route->update([
                        'seats' => $row['cantidad_de_asientos'],
                        'base_value' => $row['tarifa_base']
                    ]);
                } else {
                    Route::create([
                        'origin' => $origin,
                        'destination' => $destination,
                        'seats' => $row['cantidad_de_asientos'],
                        'base_value' => $row['tarifa_base']
                    ]);
                }

                $invalidRows = array_filter($invalidRows, function ($invalidRow) {
                    return $invalidRow['origen'] !== null || $invalidRow['destino'] !== null || $invalidRow['cantidad_de_asientos'] !== null || $invalidRow['tarifa_base'] !== null;
                });

                session()->put('validRows', $validRows);
                session()->put('invalidRows', $invalidRows);
                session()->put('duplicatedRows', $duplicatedRows);
                session()->put('orderRows', $orderRows);
                session()->put('colors', $colors);
                return redirect()->route('routesAdd.index');
            }
        }
    }
}
