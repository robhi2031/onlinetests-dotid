<?php

namespace App\Repositories;

use App\Models\Province;
use App\Models\City;

class ProvinceCityDatabaseRepository implements ProvinceCityRepositoryInterface
{  
  /**
   * getProvinceById
   *
   * @param  mixed $provinceId
   * @return void
   */
  public function getProvinceById($provinceId)
  {
    return Province::find($provinceId);
  }
  
  /**
   * getCityById
   *
   * @param  mixed $cityId
   * @return void
   */
  public function getCityById($cityId)
  {
    $city = City::find($cityId);
    $city->province;
    return $city;
  }
}
