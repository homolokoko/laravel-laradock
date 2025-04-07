<?php

namespace App\Http\Controllers\Setup\Citizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setup\Citizen;
use Illuminate\Support\Arr;


class StateController extends Controller
{
    protected function valid(Request $request)
    {
        return $request->validate([
            'name'=>'required|min:3',
            'country_id'=>'int'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stateList = Citizen\State::with('country')
            ->orderBy('name')->paginate();
        return response()->json($stateList,200);
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
        $state = Citizen\State::create($this->valid($request));
        return response()->json($state,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $state = Citizen\State::find($id);
        return response()->json($state, 200);
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
        $state = Citizen\State::where('id',$id);
        $state->update($this->valid($request));
        return response()->json($state->first(),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = Citizen\State::where('id', $id);
        $state->delete();
        return response()->json($state->withTrashed()->first(), 200);
    }

}
