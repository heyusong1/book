<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
        //查询前台用户信息
    public function selece_userInfo($admin_user_id)
    {
            return DB::table("user_info")->where("admin_user_id",$admin_user_id)->first();
    }
    public function insert_user($data)
    {
        $arr['admin_user_id']      = $data['admin_user_id'];
        $arr['user_info_email']    = $data['user_info_email'];
        $arr['user_info_site']     = $data['user_info_site'];
        $arr['user_info_sex']      = $data['user_info_sex'];
        $arr['user_info_id_card']  = $data['user_info_id_card'];
       
        return DB::table("user_info")->insertGetId($arr);
    }
    public function selece_userdata($admin_user_id)
    {
        return DB::select("select * from `admin_user` inner join `user_info` on `admin_user`.`admin_user_id` = `user_info`.`admin_user_id` where  `admin_user`.`admin_user_id` = '$admin_user_id' limit 1");
    }
    public function updateuser($admin_user_id,$data)
    { 
        $arr['user_info_email']   = $data['user_info_email'];
        $arr['user_info_site']    = $data['user_info_site'];
        $arr['user_info_sex']     = $data['user_info_sex'];
        $arr['user_info_id_card'] = $data['user_info_id_card'];
        return DB::table("user_info")->where("admin_user_id",$admin_user_id)->update($arr);
    }
   
}
?>