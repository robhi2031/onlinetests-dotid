<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaongkirService;

class RajaongkirController extends Controller
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
     * getProvinces
     *
     * @return void
     */
    public function getProvinces()
    {
        $provinces = $this->rajaongkirService->getProvinces();
        return response()->json($provinces);
    }
    
    /**
     * getCities
     *
     * @return void
     */
    public function getCities()
    {
        $cities = $this->rajaongkirService->getCities();
        return response()->json($cities);
    }
}
