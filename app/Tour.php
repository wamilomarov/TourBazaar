<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

    protected $fillable = [
        'title_en', 'title_az', 'expire_time', 'price', 'description_en', 'description_az', 'is_hot'
    ];
}
