<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Sosmed extends Model
{
    protected $table = 'sosmed';

    public static function getAll(){
        $sosmed = DB::table('sosmed')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $sosmed;
    }
}
