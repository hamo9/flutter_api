<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResturantResource;
use App\Models\resturants;
use Illuminate\Http\Request;

class ResturantControlle extends Controller
{
    public function index()
    {
        $data = ResturantResource::collection(resturants::all());
        return response()->json($data, 200);
    }

    public function resturants_by_idcategory(Request $request)
    {

        $check = resturants::where('id_category',$request->id)->get();
        if ($check->count() > 0) {
            $data = ResturantResource::collection($check);
            return response()->json($data, 200);
        }else {
            return response()->json(['msg'=>'not found this id'], 401);
        }



    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $restu = resturants::where('name','like','%'.$search.'%')->orderBy('id')->get();

            $data = ResturantResource::collection($restu);
            return response()->json($data, 200);

        }

    }

    public function show(Request $request)
    {

        $check = resturants::find($request->id);
        if ($check) {
            $data = new ResturantResource($check);
            return response()->json($data, 200);
        }else {
            return response()->json(['msg'=>'not found this id'], 401);
        }

    }
}
