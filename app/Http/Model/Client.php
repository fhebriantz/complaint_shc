<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Client extends Model
{
    protected $table = 'client';

    public static function getAll(){
        $client = DB::table('client')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $client;
    }
}
