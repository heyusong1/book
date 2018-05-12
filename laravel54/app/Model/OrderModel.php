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
        return DB::table("order_book")->where("admin_user_id",$admin_user_id)->where("book_message_id",$book_message_id)->first();
    }
    //查询借阅书籍总数
    public function select_loan_num($admin_user_id)
    {
        return DB::table("loan_book")->where("admin_user_id",$admin_user_id)->count();
    }
    //查询预约书籍总数
    public function select_order_num($admin_user_id)
    {
        return DB::table("order_book")->where("admin_user_id",$admin_user_id)->count();
    }
    //预约书籍入库
    public function insert_order($data)
    {
        return DB::table('order_book')->insertGetId($data); 
    }
    //查询所有书籍
    public function select_allbook()
    {
        return DB::table("book_message")->get();
    }
    //查询待分配的预约的书籍
    public function select_allorder()
    {
        return DB::select("select * from order_book where order_state=0 order by order_time desc");
    }
    public function order_book($order_id)
    {
        return DB::table("order_book")->where("order_id",$order_id)->first();
    }
    public function one_book($book_message_id)
    {
        return DB::table("book_message")->where("book_message_id",$book_message_id)->first();
    }
    public function insert_loan($data)
    {
        return DB::table('loan_book')->insertGetId($data); 
    }
    public function update_num($book_message_id,$book_message_num)
    {
        $data['book_message_num']=$book_message_num;
        return DB::table('book_message')->where("book_message_id",$book_message_id)->update($data); 
    }
    public function del_order($order_id)
    {
        return DB::table('order_book')->where("order_id",$order_id)->delete(); 
    }
      //查询是否已经借阅过本书
    public function select_is_loan($admin_user_id,$book_message_id)
    {
        return DB::table("loan_book")->where("admin_user_id",$admin_user_id)->where("book_message_id",$book_message_id)->first();
    }
   
}
?>