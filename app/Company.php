<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name','city','adress','phone_number'];
    protected $table = 'companies';

    public function  jobs(){
        return $this->belongsTo('App\Job');
    }
}
