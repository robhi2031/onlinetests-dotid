<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use App\Repositories\ProvinceCityRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $provinceCityRepository;
    
    /**
     * __construct
     *
     * @param  mixed $provinceCityRepository
     * @return void
     */
    public function __construct(ProvinceCityRepositoryInterface $provinceCityRepository)
    {
        $this->provinceCityRepository = $provinceCityRepository;
    }
    
    /**
     * searchProvinces
     *
     * @param  mixed $request
     * @return void
     */
    public function searchProvinces(Request $request)
    {
        $provinceId = $request->input('id');
        // $province = Province::find($provinceId);
        $province = $this->provinceCityRepository->getProvinceById($provinceId);
        if (!$province) {
            return response()->json(['error' => 'Province not found'], 404);
        }
        return response()->json($province);
    }
    
    /**
     * searchCities
     *
     * @param  mixed $request
     * @return void
     */
    public function searchCities(Request $request)
    {
        $cityId = $request->input('id');
        // $city = City::find($cityId);
        $city = $this->provinceCityRepository->getCityById($cityId);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        return response()->json($city);
    }
}
