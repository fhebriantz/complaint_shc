<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    public static function getAll(){
        $portfolio = DB::table('portfolio')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $portfolio;
    }
}
