<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserModel extends Model
{
        protected $tableName = 'user_info';
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
     public function xiangqing($admin_user_id)  
    {
        return DB::table("user_info")->where('admin_user_id',$admin_user_id)->first();
    }

    public function select_loan($admin_user_id)
    {
        return DB::table("loan_book")->join('book_message','loan_book.book_message_id',"=","book_message.book_message_id")->join('book_type','book_message.book_type_id',"=","book_type.book_type_id")->where("admin_user_id",$admin_user_id)->get();
    }
    public function select_order($admin_user_id)
    {
        return DB::table("order_book")->join('book_message','order_book.book_message_id',"=","book_message.book_message_id")->join('book_type','book_message.book_type_id',"=","book_type.book_type_id")->where("admin_user_id",$admin_user_id)->get();
    }
    public function one_order($order_id)
    {
        return DB::table("order_book")->where("order_id",$order_id)->first();
    }
    public function del_order($order_id)
    {
        return DB::table("order_book")->where("order_id",$order_id)->delete();
    }

   
}
?>