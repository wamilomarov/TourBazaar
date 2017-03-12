<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{

    protected $fillable = [
        'user_id', 'title_en', 'title_az', 'expire_time', 'price', 'currency', 'description_en', 'description_az', 'is_hot'
    ];
}
