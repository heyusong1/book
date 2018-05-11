<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use DB;

class OrderModel extends Model
{
//展示  
    // public function getlist()
    // {
    //     return DB::table('lianxi0609')->get();
    // }

    //查询书籍是否存在
    public function select_one_book($book_message_id)
    {
        return DB::table("book_message")->where("book_message_id",$book_message_id)->first();
    }
    //查询是否已经预约过本书
    public function select_is_order($admin_user_id,$book_message_id)
    {
        return DB::table("order")->where("admin_user_id",$admin_user_id)->where("book_message_id",$book_message_id)->first();
    }
    //查询借阅书籍总数
    public function select_loan_num($admin_user_id)
    {
        return DB::table("loan_book")->where("admin_user_id",$admin_user_id)->count();
    }
    //查询预约书籍总数
    public function select_order_num($admin_user_id)
    {
        return DB::table("order")->where("admin_user_id",$admin_user_id)->count();
    }
    //预约书籍入库
    public function insert_order($data)
    {
        return DB::table('order')->insertGetId($data); 
    }
   
}
?>