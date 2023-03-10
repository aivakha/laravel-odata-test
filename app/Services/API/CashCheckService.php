<?php

namespace App\Services\API;

use GuzzleHttp\Client;

class CashCheckService extends ODATA
{

    public function fetchDataFromLastQuarter(int $year)
    {
        $currentYear = date('Y');

        if ($year > $currentYear) {
            throw new \Exception("The year should be equal or less than {$currentYear}");
        }

        $client = new Client([
            'base_uri' => $this->apiEndpoint,
            'headers' => [
                'Accept' => 'application/json',
            ],
            'verify' => false,
            'auth' => [
                env('ODATA_API_LOGIN'), env('ODATA_API_PASSWORD')
            ]
        ]);

        $response = $client->request('GET', 'standard.odata/Document_ДенежныйЧек?$filter=year(Date) eq 2022 and month(Date) ge 10');

        $data = collect(json_decode($response->getBody(), true));

        if ($data->isEmpty()) return false;

        return $data['value'];
    }
}
