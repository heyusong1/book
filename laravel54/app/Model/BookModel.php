<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class BookModel extends Model
{
	public function add($data)
	{
		return DB::table('book_type')->insert($data);
	}

	//查询数据
	public function show()
	{
		return DB::table('book_type')->get();
	}

	//单条查询
	public function see($data)
	{
		return DB::table('book_type')->where('book_type_name',$data['book_type_name'])->first();
	}

	//根据id查询单条
	public function look($id)
	{
		return DB::table('book_type')->where('book_type_id',$id)->first();
	}

	//单删
	public function del($id)
	{
		return DB::table('book_type')->where('book_type_id',$id)->delete();
	}

	//修改数据
	 public function upd($id,$data)
	 {
	 	return DB::table('book_type')->where('book_type_id',$id)->update($data);
	 }

	 //文件上传
	 public function add_books($data)
	 {
	 	return  DB::table('book_message')->insert($data);
	 }

	 //图书查询
	 public function books_show()
	 {
	 	return DB::table('book_message')->get();
	 }

	 //图书删除
	 public function books_del($id)
	 {
	 	return DB::table('book_message')->where('book_message_id',$id)->delete();
	 }

	 //单条查询
	  public function books_update($id)
	 {
	 	return DB::table('book_message')->where('book_message_id',$id)->first();
	 }

	 //修改图书
	 public function books_books($id,$data)
	 {
	 	return DB::table('book_message')->where('book_message_id',$id)->update($data);
	 }

    
    public function select_booktype()
    {
        return DB::table("book_type")->get();
    }

    
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