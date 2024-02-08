<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RajaongkirService;

class RajaongkirController extends Controller
{
    protected $rajaongkirService;

    public function __construct(RajaongkirService $rajaongkirService)
    {
        $this->rajaongkirService = $rajaongkirService;
    }

    public function getProvinces()
    {
        $provinces = $this->rajaongkirService->getProvinces();
        return response()->json($provinces);
    }

    public function getCities()
    {
        $cities = $this->rajaongkirService->getCities();
        return response()->json($cities);
    }
}
