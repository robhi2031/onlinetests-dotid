<?php

namespace App\Repositories;

interface ProvinceCityRepositoryInterface
{  
  /**
   * getProvinceById
   *
   * @param  mixed $provinceId
   * @return void
   */
  public function getProvinceById($provinceId);

  /**
   * getCityById
   *
   * @param  mixed $cityId
   * @return void
   */
  public function getCityById($cityId);
}