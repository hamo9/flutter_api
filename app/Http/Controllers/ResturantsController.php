<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\resturants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
class ResturantsController extends Controller
{

    public function index()
    {
        $resturants = resturants::all();
        return view('admin.resturants.index',compact('resturants'));
    }


    public function add()
    {
        $categories = categories::all();
        return view('admin.resturants.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'profile_img' => 'required',
            'cover_img' => 'required',
            'location' => 'required',
            'id_category' => 'required',
            'facebook' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        } else {

            $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

            if ($request->hasFile('profile_img') && $request->hasFile('cover_img')) {
                $file1 = $request->file('profile_img');
                $file2 = $request->file('cover_img');

                $extintion1 = $file1->getClientOriginalExtension();
                $extintion2 = $file2->getClientOriginalExtension();


                if (in_array($extintion1, $ar_ex) && in_array($extintion2, $ar_ex)) {
                    $filename1 = time() . 'profile.' . $extintion1;
                    $filename2 = time() . 'cover.' . $extintion2;

                    $file1->move('admin/img/upload/', $filename1);
                    $file2->move('admin/img/upload/', $filename2);


                    $resturants = new resturants([
                        'name' => $request->name,
                        'title' => $request->title,
                        'location' => $request->location,
                        'facebook' => $request->facebook,
                        'id_category' => $request->id_category,
                        'profile_img' => env('APP_URL') . '/admin/img/upload/'.$filename1,
                        'cover_img' => env('APP_URL') . '/admin/img/upload/'.$filename2

                    ]);
                    $resturants->save();
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
        $resturant = resturants::find($id);
        if ($resturant) {
            $categories = categories::all();
            return view('admin.resturants.edit',compact('resturant','categories'));
        }else {
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {

        $resturants = resturants::find($request->id);
        $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

        if ($request->hasFile('profile_img')) {

            if ($resturants->profile_img) {

                $path = env('APP_URL').'admin/img/upload/' . $resturants->profile_img . '';
                if (File::exists($path)) {
                    File::delete($path);
                }

            }

            $file = $request->file('profile_img');
            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '.' . $extintion;
                $file->move('admin/img/upload/', $filename);
            }
            $resturants->profile_img = env('APP_URL') . '/admin/img/upload/' . $filename;
            $resturants->save();
        }

        if ($request->hasFile('cover_img')) {

            if ($resturants->cover_img) {

                $path = env('APP_URL').'admin/img/upload/' . $resturants->cover_img . '';
                if (File::exists($path)) {
                    File::delete($path);
                }

            }

            $file = $request->file('cover_img');
            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '0.' . $extintion;
                $file->move('admin/img/upload/', $filename);
            }
            $resturants->cover_img = env('APP_URL') . '/admin/img/upload/' . $filename;
            $resturants->save();
        }


        $resturants->name = $request->name;
        $resturants->title = $request->title;
        $resturants->location = $request->location;
        $resturants->facebook = $request->facebook;
        $resturants->id_category = $request->id_category;

        $resturants->save();

        return redirect()->back()->with('success', 'resturant updated successfuly');
    }

    public function delete($id)
    {
        $resturants = resturants::find($id);
        if ($resturants) {
            $resturants->delete();
            return redirect()->back()->with('success', 'resturant deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'resturant not found');
        }
    }
}
