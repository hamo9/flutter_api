<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant_list_menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_resturant', 'menu_img'
    ];
}
