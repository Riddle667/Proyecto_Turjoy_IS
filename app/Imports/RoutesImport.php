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
    protected $orderRows = [];
    protected $colors = [];

    /**
     * Importar una colección de filas desde el archivo Excel.
     *
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (isset($row['origen']) && isset($row['destino'])) {
                $origin = $row['origen'];
                $destination = $row['destino'];

                // Validación: Verifica si la combinación origen y destino ya existe en el archivo
                if ($this->hasDuplicateOriginDestination($origin, $destination)) {
                    // Si ya existe, marca la fila como duplicada
                    $this->duplicatedRows[] = $row;
                    $this->orderRows[] = $row;
                    $this->colors[] = 1;
                } else {
                    $tarifa_base = str_replace(['$', '.'], '', $row['tarifa_base']);
                    $row['tarifa_base'] = $tarifa_base;
                    // Validación: Verifica que los campos "orige" "destino" "stock" y "mount" sean numéricos y requeridos.
                    if (isset($row['origen']) && isset($row['destino']) && isset($row['cantidad_de_asientos']) && isset($row['tarifa_base']) && is_numeric($row['cantidad_de_asientos']) && is_numeric($row['tarifa_base']) && $row['cantidad_de_asientos'] > 0 && $row['tarifa_base'] > 0) {
                        // Filas válidas
                        $this->validRows[] = $row;
                        $this->orderRows[] = $row;
                        $this->colors[] = 0;
                        // Registra la combinación origen y destino
                        $this->existingOriginsDestinations[] = $origin . '-' . $destination;
                    } else {
                        // Filas inválidas
                        $this->invalidRows[] = $row;
                        $this->orderRows[] = $row;
                        $this->colors[] = 2;
                    }
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

    /**
     * Obtener filas ordenadas.
     *
     * @return array
     */
    public function getOrderRows()
    {
        return $this->orderRows;
    }

    /**
     * Obtener colores.
     *
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }
}
