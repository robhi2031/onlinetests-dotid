<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class RajaongkirService
{
  protected $baseUrl;
  protected $apiKey;

  public function __construct()
  {
    $this->baseUrl = config('app.roa_url');
    $this->client = new Client([
      'base_uri' => $this->baseUrl,
    ]);
    $this->apiKey = config('app.roa_key');
  }
  
  /**
   * getProvinces
   *
   * @return void
   */
  public function getProvinces()
  {
    $response = $this->client->request('GET', 'province', [
      'headers' => [
        'key' => $this->apiKey,
      ],
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }
  
  /**
   * getProvinceById
   *
   * @param  mixed $provinceId
   * @return void
   */
  public function getProvinceById($provinceId)
  {
    $response = Http::withHeaders([
      'key' => $this->apiKey,
    ])->get($this->baseUrl. "province", [
        'id' => $provinceId,
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }
  
  /**
   * getCities
   *
   * @return void
   */
  public function getCities()
  {
    $response = $this->client->request('GET', 'city', [
      'headers' => [
        'key' => $this->apiKey,
      ],
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }
  
  /**
   * getCityById
   *
   * @param  mixed $cityId
   * @return void
   */
  public function getCityById($cityId = null)
  {
    $response = Http::withHeaders([
      'key' => $this->apiKey,
    ])->get($this->baseUrl. "city", [
        'id' => $cityId,
    ]);

    return json_decode($response->getBody()->getContents(), true);
  }
}
