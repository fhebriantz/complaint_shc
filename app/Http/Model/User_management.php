<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_management extends Model
{
    protected $table = 'user_management';
    protected  $primaryKey = 'id';

    public static function getTableUser(){
        
        $user_management = DB::table('user_management')
            ->select('user_management.*')
            ->get(); 
     return $user_management;
    }
}
