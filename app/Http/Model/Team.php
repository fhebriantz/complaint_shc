<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Team extends Model
{
    protected $table = 'team';

    public static function getAll(){
        $team = DB::table('team')
            ->select('*')
            ->where('is_active','=',1)
            ->get();

     return $team;
    }
}
