<?php

namespace App\Http\Controllers\Setup\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Setup\Citizen;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CountryController extends Controller
{

    public function valid(Request $request)
    {
       return $request->validate([
            'name'=>'required|min:3',
            'official'=>'required',
            'cc2' => 'required|min:2',
            'cc3'=>'required|min:3'
        ]);
    }

    public function index(Request $request){
        $query = Citizen\Country::query();
        $countries = $query->paginate(25);
        return response()->json($countries,200);
    }

    public function create()
    {
        return response()->json(['message'=>'I am request create'], 200);
    }

    public function store(Request $request){
        $country = Citizen\Country::create($this->valid($request));
        return response()->json($country,201);
    }

    public function show($id){
        $country = Citizen\Country::where('id',$id);
        return response()->json($country->first(),200);
    }

    public function edit($id){
        $country = Citizen\Country::where('id',$id);
        return response()->json($country->first(), 200);
    }

    public function update(Request $request,$id)
    {
        $country = Citizen\Country::where('id',$id);
        $country->update($this->valid($request));
        return response()->json($country->first(),203);
    }

    public function destroy(Request $request,$id)
    {
        $country = Citizen\Country::where('id', $id);
        $country->delete();
        return response()->json($country->withTrashed()->first(),205);
    }

}
