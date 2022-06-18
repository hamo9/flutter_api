<?php

namespace App\Http\Resources;

use App\Models\resturant_list_img;
use App\Models\resturant_list_menu;
use App\Models\resturant_list_phon;
use Illuminate\Http\Resources\Json\JsonResource;

class ResturantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $list_img = resturant_list_img::select('img')->where('id_resturant',$this->id)->get();
        $list_phons = resturant_list_phon::select('phone')->where('id_resturant',$this->id)->get();
        $list_menu = resturant_list_menu::select('menu_img')->where('id_resturant',$this->id)->get();


        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'location' => $this->location,
            'facebook' => $this->facebook,
            'profile_img' => $this->profile_img,
            'cover_img' => $this->cover_img,
            'list_imgs' => $list_img,
            'list_phons' => $list_phons,
            'list_menu' => $list_menu,
        ];
    }
}
