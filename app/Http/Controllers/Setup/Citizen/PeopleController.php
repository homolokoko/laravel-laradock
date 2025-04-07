<?php

namespace App\Http\Controllers\Setup\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Citizen;

class PeopleController extends Controller
{
    protected function valid(Request $request)
    {
        return $request->validate([
            'name'=>'required|min:3',
            'city_id'=>'int'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peopleList = Citizen\People::paginate();
        return response()->json($peopleList, 200);
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
        //
        $people = Citizen\People::create($this->valid($request));
        return response()->json($people, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = Citizen\People::find($id);
        return response()->json($people,200);
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
        $people = Citizen\People::where('id',$id);
        $people->update($this->valid($request));
        return response()->json($people->first(), 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = Citizen\People::where('id',$id);
        $people->delete();
        return response()->json($people->withTrashed()->first(), 203);
    }
}
