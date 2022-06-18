<?php

namespace App\Http\Controllers;

use App\Models\resturant_list_img;
use App\Models\resturants;
use Illuminate\Http\Request;
use File;

class ResturantListImgController extends Controller
{

    public function index($id)
    {
        $resturant = resturants::find($id);
        $resturant_list_img = resturant_list_img::where('id_resturant',$id)->get();
        return view('admin.resturants.list_img.index',compact('resturant','resturant_list_img'));
    }


    public function add($id)
    {
        $resturant = resturants::find($id);
        return view('admin.resturants.list_img.add',compact('resturant'));
    }


    public function store(Request $request)
    {

        $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '.' . $extintion;

                $file->move('admin/img/upload/', $filename);


                $resturant_list_img = new resturant_list_img([
                    'img' => env('APP_URL') . '/admin/img/upload/'.$filename,
                    'id_resturant' => $request->id
                ]);
                $resturant_list_img->save();
                return redirect()->back()->with('success', 'Created successfully!');

            } else {
                return redirect()->back()->with('error', 'not added');

            }
        }

    }


    public function edit($id)
    {
        $resturant_list_img = resturant_list_img::find($id);
        return view('admin.resturants.list_img.edit',compact('resturant_list_img'));
    }


    public function update(Request $request)
    {
        $resturant_img = resturant_list_img::find($request->id);
        $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

        if ($request->hasFile('img')) {

            if ($resturant_img->img) {

                $path = env('APP_URL').'admin/img/upload/' . $resturant_img->img . '';
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
            $resturant_img->img = env('APP_URL') . '/admin/img/upload/' . $filename;
            $resturant_img->save();

            return redirect('/resturant-list-img/'.$resturant_img->id_resturant.'')->with('success', 'img updated successfuly');

        } else {
            return redirect()->back()->with('error', 'img not found');
        }
    }

    public function delete($id)
    {
        $data = resturant_list_img::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'img deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'img not found');
        }
    }
}
