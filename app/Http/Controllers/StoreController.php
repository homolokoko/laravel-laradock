<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function __construct(
        Store $store
    ){
        $this->store = $store;
    }

    public function loadAll(Request $request)
    {
        return response()->json($this->store->all());
    }

    public function saveOne(Request $request)
    {
        $store = $this->store;
        $store->name = $request->name;
        $store->save();
        return response()->json($store);
    }

    public function editOne(Request $request,$id)
    {
        $store = $this->store->find($id);
        return response()->json($store);
    }

    public function updateOne(Request $request, $id)
    {
        $store = $this->store->find($id);
        $store->name = $request->name;
        $store->update();
        return response()->json($store);
    }

    public function deleteOne(Request $request, $id)
    {
        $this->store->find($id)->delete();
        return response()->json(['message'=>'delete successfully']);
    }
}
