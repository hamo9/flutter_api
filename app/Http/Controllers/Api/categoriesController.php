<?php

namespace App\Http\Controllers\Api;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class categoriesController extends Controller
{
    public function index()
    {
        $data = CategoryResource::collection(categories::all());
        return response()->json($data, 200);
    }
}
