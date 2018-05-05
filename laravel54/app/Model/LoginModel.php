<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Model
{
//展示  
    // public function getlist()
    // {
    //     return DB::table('lianxi0609')->get();
    // }
//查询单条数据
    public function select_one($table,$where,$data)
    {
        return  DB::table("$table")->where($where,$data)->first();
         
    }

}
?>