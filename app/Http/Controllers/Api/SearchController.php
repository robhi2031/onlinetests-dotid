<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProvinces(Request $request)
    {
        $provinceId = $request->input('id');
        $province = Province::find($provinceId);
        if (!$province) {
            return response()->json(['error' => 'Province not found'], 404);
        }
        return response()->json($province);
    }

    public function searchCities(Request $request)
    {
        $cityId = $request->input('id');
        $city = City::find($cityId);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        $city->province;
        return response()->json($city);
    }
}
