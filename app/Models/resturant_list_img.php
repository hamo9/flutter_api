<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class resturant_list_img extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_resturant', 'img'
    ];

    public function resturant() : BelongsTo
    {
        return $this->belongsTo(resturants::class,'id_resturant','id');
    }

}
