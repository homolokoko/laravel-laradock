<?php

namespace App\Http\Controllers\Setup\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Citizen;

class CityController extends Controller
{
    protected function valid(Request $request)
    {
        return $request->validate([
            'name'=>'required|min:3',
            'state_id'=>'int'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cityList = Citizen\City::paginate();
        return response()->json($cityList,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = Citizen\City::create($this->valid($request));
        return response()->json($city, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = Citizen\City::find($id);
        return response()->json($city,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Citizen\City::where('id',$id);
        $city->update($this->valid($request));
        return response()->json($city->first(), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = Citizen\City::where('id',$id);
        $city->delete();
        return response()->json($city->withTrashed()->first(), 203);
    }
}
