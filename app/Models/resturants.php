<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class resturants extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title', 'location','profile_img','cover_img','status','id_category','facebook'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(categories::class,'id_category','id');
    }

}
