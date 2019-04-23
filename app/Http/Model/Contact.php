<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $table = 'contact';

    public static function getAll(){
        $contact = DB::table('contact')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $contact;
    }
}
