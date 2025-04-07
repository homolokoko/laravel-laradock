<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\Setup\Defect;
use Illuminate\Http\Request;

class DefectController extends Controller
{
    //
    public function loadAll(Request $request)
    {
        $defects = Defect\Root::get();
        return response()->json($defects);
    }

    public function editOne(Request $request, $param)
    {
        $defect = Defect\Root::where('id',$param);
        return response()->json($defect->first());
    }

}
