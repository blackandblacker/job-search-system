<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['position'];



    public function company()
    {
        return $this->hasMany('App\Company');
    }
}
