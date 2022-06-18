<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = categories::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'img' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        } else {

            $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $extintion = $file->getClientOriginalExtension();

                if (in_array($extintion, $ar_ex)) {
                    $filename = time() . '.' . $extintion;
                    $file->move('admin/img/upload/', $filename);

                    $categories = new categories([
                        'name' => $request->name,
                        'img' => env('APP_URL') . '/admin/img/upload/'.$filename
                    ]);
                    $categories->save();
                    return redirect()->back()->with('success', 'Created successfully!');

                } else {
                    return redirect()->back()->with('error', 'not added');

                }
            }




        }

        return $request;
    }


    public function edit($id)
    {
        if ($id) {
            $category = categories::find($id);
            if ($category) {

                return view('admin.categories.edit',compact('category'));
            }
            return redirect()->back();
        }else {
            return redirect()->back();
        }

    }

    public function update(Request $request)
    {

        $category = categories::find($request->id);
        $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

        if ($request->hasFile('img')) {

            if ($category->img) {

                $path = env('APP_URL').'admin/img/upload/' . $category->img . '';
                if (File::exists($path)) {
                    File::delete($path);
                }

            }

            $file = $request->file('img');
            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '.' . $extintion;
                $file->move('admin/img/upload/', $filename);
            }
            $category->img = env('APP_URL') . '/admin/img/upload/' . $filename;
            $category->save();
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'category updated successfuly');
    }


    // ==============================
    public function delete($id)
    {

        $categories = categories::find($id);
        if ($categories) {
            $categories->delete();
            return redirect()->back()->with('success', 'category deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'category not found');
        }
    }
}
