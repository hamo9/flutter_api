<?php

namespace App\Http\Controllers;

use App\Models\resturant_list_menu;
use App\Models\resturants;
use Illuminate\Http\Request;

use File;

class ResturantListMenuController extends Controller
{

    public function index($id)
    {
         $resturant = resturants::find($id);
         if ($resturant) {
            $data = resturant_list_menu::where('id_resturant',$id)->get();

            return view('admin.resturants.list_menu.index',compact('resturant','data'));
         }

    }

    public function add($id)
    {
        $resturant = resturants::find($id);
        return view('admin.resturants.list_menu.add',compact('resturant'));
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


                $resturant_list_menu = new resturant_list_menu([
                    'menu_img' => env('APP_URL') . '/admin/img/upload/'.$filename,
                    'id_resturant' => $request->id
                ]);
                $resturant_list_menu->save();
                return redirect()->back()->with('success', 'Created successfully!');

            } else {
                return redirect()->back()->with('error', 'not added');

            }
        }

    }

    public function edit($id)
    {
        $resturant_list_menu = resturant_list_menu::find($id);
        return view('admin.resturants.list_menu.edit',compact('resturant_list_menu'));
    }


    public function update(Request $request)
    {
        $resturant_list_menu = resturant_list_menu::find($request->id);
        $ar_ex =  array('png', 'jpg', 'jpeg', 'svg');

        if ($request->hasFile('img')) {

            if ($resturant_list_menu->menu_img) {

                $path = env('APP_URL').'admin/img/upload/' . $resturant_list_menu->menu_img . '';
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
            $resturant_list_menu->menu_img = env('APP_URL') . '/admin/img/upload/' . $filename;
            $resturant_list_menu->save();

            return redirect('/resturant-list-menu/'.$resturant_list_menu->id_resturant.'')->with('success', 'menu updated successfuly');

        } else {
            return redirect()->back()->with('error', 'menu not found');
        }
    }

    
    public function delete($id)
    {
        $data = resturant_list_menu::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'menu deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'menu not found');
        }
    }
}
