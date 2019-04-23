<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Feature extends Model
{
    protected $table = 'feature';

    public static function getAll(){
        $feature = DB::table('feature')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $feature;
    }
}
