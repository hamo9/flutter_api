<?php

namespace App\Http\Controllers;

use App\Models\resturants;
use Illuminate\Http\Request;
use App\Models\resturant_list_phon;

class ResturantListPhonController extends Controller
{

    public function index($id)
    {
        $resturant = resturants::find($id);
        $resturant_list_phons = resturant_list_phon::where('id_resturant',$id)->get();
        return view('admin.resturants.list_phons.index',compact('resturant','resturant_list_phons'));
    }

    public function add($id)
    {
        $resturant = resturants::find($id);
        return view('admin.resturants.list_phons.add',compact('resturant'));
    }

    public function store(Request $request)
    {

        if ($request->phone) {

                $resturant_list_phon = new resturant_list_phon([
                    'phone' => $request->phone,
                    'id_resturant' => $request->id
                ]);
                $resturant_list_phon->save();
                return redirect()->back()->with('success', 'Created successfully!');

            } else {
                return redirect()->back()->with('error', 'not added');

            }


    }

    public function edit($id)
    {
        $resturant_list_phon = resturant_list_phon::find($id);
        return view('admin.resturants.list_phons.edit',compact('resturant_list_phon'));
    }


    public function update(Request $request)
    {
        $resturant_list_phon = resturant_list_phon::find($request->id);


        if ($request->phone) {

            $resturant_list_phon->phone = $request->phone;
            $resturant_list_phon->save();

            return redirect('/resturant-list-phons/'.$resturant_list_phon->id_resturant.'')->with('success', 'phone updated successfuly');

        } else {
            return redirect()->back()->with('error', 'phone not found');
        }
    }


    public function delete($id)
    {
        $data = resturant_list_phon::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'phone deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'phone not found');
        }
    }
}
