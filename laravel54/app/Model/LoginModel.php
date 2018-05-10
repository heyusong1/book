<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Model
{
    protected $tableName = 'admin_user';
//展示  
    // public function getlist()
    // {
    //     return DB::table('lianxi0609')->get();
    // }
<<<<<<< HEAD
=======


    
>>>>>>> 6549cf411779661e1cb291ffcbd1c4b6d321a13e
//查询单条数据
    public function select_one($table,$where,$data)
    {
        return  DB::table("$table")->where($where,$data)->first();

    }
    //登录注册
    public function insert($input)
    {
        $data['admin_user_name'] = $input['admin_user_name'];
        $data['admin_user_pwd'] = md5($input['admin_user_pwd']);
        $data['admin_user_tel'] = $input['admin_user_tel'];
        return DB::table($this->tableName)->insert($data);
    }
    //用户登录
    public function login($admin_user_name,$admin_user_pwd)
    {

        return DB::table($this->tableName)->where('admin_user_name',$admin_user_name)->where("admin_user_pwd",$admin_user_pwd)->first();
    }
    //用户查询
    public function select_name($table,$where,$data)
    {
        return  DB::table("$table")->where($where,$data)->first();

    }
<<<<<<< HEAD
=======
    //用户展示
     public function show_a(){
   
          return DB::table($this->tableName)->get();
    }
>>>>>>> 6549cf411779661e1cb291ffcbd1c4b6d321a13e
}
?>