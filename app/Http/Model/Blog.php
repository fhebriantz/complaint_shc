<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    protected $table = 'blog';

    public static function getAll(){
        $blog = DB::table('blog')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $blog;
    }
}
