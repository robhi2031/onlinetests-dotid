<?php

namespace App\Repositories;

use App\Services\RajaongkirService;

class ProvinceCityRajaongkirRepository implements ProvinceCityRepositoryInterface
{
  protected $rajaongkirService;
  
  /**
   * __construct
   *
   * @param  mixed $rajaongkirService
   * @return void
   */
  public function __construct(RajaongkirService $rajaongkirService)
  {
    $this->rajaongkirService = $rajaongkirService;
  }
  
  /**
   * getProvinceById
   *
   * @param  mixed $provinceId
   * @return void
   */
  public function getProvinceById($provinceId)
  {
    // Mengambil data provinsi dari API Rajaongkir
    $response = $this->rajaongkirService->getProvinceById($provinceId);
    return $response;
  }
  
  /**
   * getCityById
   *
   * @param  mixed $cityId
   * @return void
   */
  public function getCityById($cityId)
  {
    // Mengambil data kota dari API Rajaongkir
    $response = $this->rajaongkirService->getCityById($cityId);
    return $response;
  }
}
