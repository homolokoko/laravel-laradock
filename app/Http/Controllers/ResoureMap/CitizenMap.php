<?php

namespace App\Http\Controllers\ResoureMap;

use App\Http\Controllers\Controller;
use App\Lib\ResourceMap;
use App\Models\Setup\Citizen;
use Illuminate\Http\Request;

class CitizenMap extends Controller
{
    public function countryList()
    {
        $country = Citizen\Country::get();
        $list = ResourceMap::getValueText($country);
        return response()->json($list);
    }

    public function statesByCountry($id)
    {
        $states = Citizen\State::where('country_id',$id);
        $list = ResourceMap::getValueText($states->get());
        return response()->json($list);
    }

    public function citiesByState($id)
    {
        $cities = Citizen\City::where('state_id',$id);
        $list = ResourceMap::getValueText($cities->get());
        return response()->json($list);
    }

    public function peopleByCity($id)
    {
        $people = Citizen\People::where('city_id',$id);
        $list = ResourceMap::getValueText($people->get());
        return response()->json($list);

    }
}
