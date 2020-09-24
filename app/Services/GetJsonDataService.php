<?php

namespace App\Services;

use Exception;

class GetJsonDataService 
{
    protected function getData(string $url, array $fields) 
    {
        $data = file_get_contents($url . '?fields=' . implode(',', $fields));

        if ($data === false) {
            throw new Exception("Não foi possível obter os dados, destino offline, tente novamente mais tarde.");
        }

        $jsonData = json_decode($data, true);

        if ($jsonData === false) {
            throw new Exception("Não foi possível decodificar os dados obtidos.");
        }

        return $jsonData;
    }
}