<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $table = 'comment';

    public static function getAll(){
        $comment = DB::table('comment')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $comment;
    }
}
