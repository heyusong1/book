<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class IndexModel extends Model
{
//展示  
    // public function getlist()
    // {
    //     return DB::table('lianxi0609')->get();
    // }


    
//查询单条数据
    public function select_booktype()
    {
        return DB::table("book_type")->get();
    }
    //图书查询
    public function select_count($book_message_name,$book_type_id){
    	if($book_message_name=="" && $book_type_id=="")
    	{
    		return DB::table("book_message")->join('book_type', 'book_message.book_type_id', '=', 'book_type.book_type_id')->count();
    	}
    	if($book_message_name!="" && $book_type_id=="")
    	{
    		$num= DB::select("select  * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where `book_message_name` like '%$book_message_name%'");
    		return count($num);
    	}
    	if($book_message_name=="" && $book_type_id!="")
    	{
    		$num= DB::select("select  * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where  `book_message`.`book_type_id` = '$book_type_id'");
    		return count($num);
    	}
    	if($book_message_name!="" && $book_type_id!="")
    	{
    		$num= DB::select("select  * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where `book_message_name` like '%$book_message_name%' and `book_message`.`book_type_id` = '$book_type_id'");
    		return count($num);
    	}
		
    }
    //图书查询
    public function select_book($book_message_name,$book_type_id,$limit,$size)
    {
    	if($book_message_name=="" && $book_type_id=="")
    	{
    		return DB::select("select * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id`  limit $limit,$size");
    	}
    	if($book_message_name!="" && $book_type_id=="")
    	{
    		return DB::select("select * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where `book_message_name` like '%$book_message_name%' limit $limit,$size");
    	}
    	if($book_message_name=="" && $book_type_id!="")
    	{
    		return DB::select("select * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where  `book_message`.`book_type_id` = '$book_type_id' limit $limit,$size");
    	}
    	if($book_message_name!="" && $book_type_id!="")
    	{
    		return DB::select("select * from `book_message` inner join `book_type` on `book_message`.`book_type_id` = `book_type`.`book_type_id` where `book_message_name` like '%$book_message_name%' and `book_message`.`book_type_id` = '$book_type_id' limit $limit,$size");
    	}
		
    	
    }

}
?>