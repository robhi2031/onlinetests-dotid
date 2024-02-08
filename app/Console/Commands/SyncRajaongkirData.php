<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\RajaongkirService;
use App\Models\Province;
use App\Models\City;

class SyncRajaongkirData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-rajaongkir-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync provinces and cities data from Rajaongkir API to database';

    protected $rajaongkirService;
    
    /**
     * __construct
     *
     * @param  mixed $rajaongkirService
     * @return void
     */
    public function __construct(RajaongkirService $rajaongkirService)
    {
        parent::__construct();
        $this->rajaongkirService = $rajaongkirService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get provinces data from Rajaongkir API
        $provinces = $this->rajaongkirService->getProvinces();
        foreach ($provinces['rajaongkir']['results'] as $provinceData) {
            Province::updateOrCreate([
                'id' => $provinceData['province_id'],
            ], [
                'name' => $provinceData['province'],
            ]);
        }

        // Get cities data from Rajaongkir API
        $cities = $this->rajaongkirService->getCities();
        foreach ($cities['rajaongkir']['results'] as $cityData) {
            City::updateOrCreate([
                'id' => $cityData['city_id'],
            ], [
                'province_id' => $cityData['province_id'],
                'type' => $cityData['type'],
                'name' => $cityData['city_name'],
                'postal_code' => $cityData['postal_code']
            ]);
        }

        $this->info('Provinces and cities data synced successfully.');
    }
}
