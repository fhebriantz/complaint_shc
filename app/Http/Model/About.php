<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
    protected $table = 'about';

    public static function getAll(){
        $about = DB::table('about')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $about;
    }
}
