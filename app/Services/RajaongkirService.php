<?php

namespace App\Services;

use GuzzleHttp\Client;

class RajaongkirService
{
  protected $client;
  protected $apiKey;

  public function __construct()
  {
    $this->client = new Client([
      'base_uri' => 'https://api.rajaongkir.com/starter/',
    ]);
    $this->apiKey = config('app.roa_key');
  }

  public function getProvinces()
  {
    $response = $this->client->request('GET', 'province', [
      'headers' => [
        'key' => $this->apiKey,
      ],
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }

  public function getCities()
  {
    $response = $this->client->request('GET', 'city', [
      'headers' => [
        'key' => $this->apiKey,
      ],
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }
}
