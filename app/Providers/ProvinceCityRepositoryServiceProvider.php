<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ProvinceCityRepositoryInterface;
use App\Repositories\ProvinceCityDatabaseRepository;
use App\Repositories\ProvinceCityRajaongkirRepository;
use App\Services\RajaongkirService;
use Illuminate\Support\Facades\Config;

class ProvinceCityRepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    // if (Config::get('app.roa_src')) {
    if (config('app.roa_src')) {
      $this->app->bind(ProvinceCityRepositoryInterface::class, function ($app) {
        return new ProvinceCityRajaongkirRepository(
          new RajaongkirService()
        );
      });
    } else {
      $this->app->bind(ProvinceCityRepositoryInterface::class, ProvinceCityDatabaseRepository::class);
    }
  }
}
