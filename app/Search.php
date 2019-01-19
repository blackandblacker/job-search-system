<?php
/**
 * Created by PhpStorm.
 * User: Kalin
 * Date: 1/19/2019
 * Time: 1:42 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Search extends  Model
{
   public function  search($query,$s){
       return $query->where('position','like','%'.$s. '%')
               ->orWhere('company','like','%' .$s. '%')
               ->orWhere('city','like','%' .$s. '%');
   }
}