<?php

namespace App\Business;

use GuzzleHttp\Client;

class Api
{
    public function shops()
    {
        return $this->request('GET', '/shops');
    }

    public function labels()
    {
        $shop = (new Settings())->get('storeId');
        if (!$shop) {
            return [];
        }

        return $this->request('POST', '/labels',[
            'shop_id' => $shop,
        ]);
    }

    public function request(string $method, string $url, array $params = [])
    {
        $client = new Client([
            'base_uri' => config('app.shop_url'),
            'verify'   => false,
        ]);

        $options = [];
        if ($method === 'GET') {
            $options['query'] = $params;
        } else {
            $options['json'] = $params;
        }

        $response = $client->request($method, '/api'.$url, $options);

        return json_decode($response->getBody()->getContents(), true);
    }
}
