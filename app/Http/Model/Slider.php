<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Slider extends Model
{
    protected $table = 'slider';

    public static function getAll(){
        $slider = DB::table('slider')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $slider;
    }
}
