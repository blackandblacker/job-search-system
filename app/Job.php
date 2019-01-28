<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['position','city','company_id'];



    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
