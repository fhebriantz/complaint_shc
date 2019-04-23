<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Address extends Model
{
    protected $table = 'address';

    public static function getAll(){
        $address = DB::table('address')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $address;
    }
}
