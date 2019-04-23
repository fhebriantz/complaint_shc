<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Career extends Model
{
    protected $table = 'career';

    public static function getAll(){
        $career = DB::table('career')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $career;
    }
}
