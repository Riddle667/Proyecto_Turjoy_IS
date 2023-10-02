<?php

namespace App\Imports;

use App\Models\Route;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RoutesImport implements ToCollection, WithHeadingRow
{
    protected $validRows = [];
    protected $invalidRows = [];
    protected $duplicatedRows = [];
    protected $existingOriginsDestinations = [];

    /**
     * Importar una colección de filas desde el archivo Excel.
     *
     * @return Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $origin = $row['origen'];
            $destination = $row['destino'];

            if ($this->hasDuplicateOriginDestination($origin, $destination)) {
                $this->duplicatedRows[] = $row;
            } else {
                $tarifa_base = str_replace(['$', '.'], '', $row['tarifa_base']);
                $row['tarifa_base'] = $tarifa_base;
                if (isset($row['origin']) && isset($row['destino']) && isset($row['cantidad_de_asientos']) && isset($row['tarifa_base']) && is_numeric($row['cantidad_de_asientos']) && is_numeric($row['tarifa_base'])) {
                    //Filas validas.
                    $this->validRows[] = $row;

                    //Registra la combinación origen y destino.
                    $this->existingOriginsDestinations[] = $origin . '-' . $destination;
                } else {
                    //Filas invalidas.
                    $this->invalidRows[] = $row;
                }
            }
        }
    }

    /**
     * Verifica si la combinación origen y destino ya existe en el archivo.
     *
     * @param string $origin
     * @param string $destination
     * @return bool
     */
    private function hasDuplicateOriginDestination($origin, $destination)
    {
        $key = $origin . '-' . $destination;
        return in_array($key, $this->existingOriginsDestinations);
    }

    /**
     * Obtener filas válidas.
     *
     * @return array
     */
    public function getValidRows()
    {
        return $this->validRows;
    }

    /**
     * Obtener filas inválidas.
     *
     * @return array
     */
    public function getInvalidRows()
    {
        return $this->invalidRows;
    }

    /**
     * Obtener filas duplicadas.
     *
     * @return array
     */
    public function getDuplicatedRows()
    {
        return $this->duplicatedRows;
    }
}
