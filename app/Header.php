<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $guarded = ['id'];

    public function photos () {
        //hasMany, hasOne, belongsTo
        return $this->hasMany(HeaderMobilePhoto::class);
    }
}
