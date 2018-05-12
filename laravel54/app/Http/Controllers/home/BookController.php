<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use App\Model\BookModel;//引入模型层
use DB;
use Illuminate\Support\Facades\Input;

  
class BookController extends Controller  
{ 
	public function book_type()
	{
		$book = new BookModel();
		$data = $book ->show();
		$data = json_decode($data); 

		$see  = $this ->digui($data);
		return view('home/book_type',['see'=>$see]);
	}

	//类型添加
	public function type_add()
	{
		//接值
		$data['book_type_name'] = $_GET['book_type_name'];
		$data['book_type_p_id'] = $_GET['book_type_id'];
		foreach ($data as $key => $val) 
		{
          if(empty($val))
          {
          	echo '<script>alert("所有内容不能为空");location.href="'.'book'.'";</script>';
          }
        }
		foreach ($data as $key => $value) 
		{
          if(empty($value))
          {
          	echo '<script>alert("所有内容不能为空");location.href="'.'add_book'.'";</script>';
          }
        }
		
		$book = new BookModel();		//实例化

		//唯一性
		$like = $book ->see($data);
		if(!empty($like))
		{
			 echo '<script>alert("分类名称已存在");location.href="'.'book'.'";</script>';
		}

		//添加
		$ass  = $book ->add($data);
		//判断
		if($ass){
			 //echo "添加成功";
			return redirect()->action('home\BookController@book_see');
		}else{
			echo '<script>alert("添加失败");location.href="'.'book'.'";</script>';
		}
	}

	public function digui($data,$path=0,$f=1)
	{
		    static $arr=array();
		    foreach($data as $key => $val) {
		    if($val->book_type_p_id == $path)
	      {

	        $val->ji=$f;
	        $arr[]=$val;
	        $this->digui($data,$val->book_type_id,$f+1);
	      }
	    }
	    return $arr;

    }



    //展示数据
    public function book_see()
    {
    	$book = new BookModel();
    	$data = $book ->show();
		$data = json_decode($data); 
		$see  = $this ->digui($data);
		return view('home/book_see',['see'=>$see]);
    }

    //删除(单删)
    public function del()
    {
    	//接值
    	$id   = $_GET['id'];
    	$book = new BookModel();
    	$arr  = $book ->look($id);
    	$arr=get_object_vars($arr);
    	//判断主分类不能删除
    	if($arr['book_type_p_id'] =='0')
    	{
    		echo '<script>alert("主分类不能删除");location.href="'.'see'.'";</script>';die;
    	}
    	$ass  = $book -> del($id);
    	//判断
    	if($ass){
    		echo '<script>alert("删除成功");location.href="'.'see'.'";</script>';
    	}else{
    		echo '<script>alert("删除失败");location.href="'.'see'.'";</script>';
    	}
    }

    //单条查询
    public function update()
    {
    	//接值
    	$id   = $_GET['id'];
    	//print_r($id);die;
      $book = new BookModel();
    	$ass  = $book ->look($id); 
    	$ass=get_object_vars($ass);
    	$data = $book ->show();
		  $data = json_decode($data); 
		  $see  = $this ->digui($data);
		//print_r($see);die;
		//判断查询的值是否和递归里的值 一致
		foreach ($see as $key => $val) {
			if($ass['book_type_p_id']==$val->book_type_id)
			{
				$val->selected="selected";
			}
			else
			{
				$val->selected="";
			}
		}
    	return view('home/book_default',['ass'=>$ass,'see'=>$see]);
    }

    //修改数据
    public function book_modify()
    {
    	//接值
    	$id = $_GET['id'];
    	$data['book_type_p_id']   =  $_GET['book_type_id'];
    	$data['book_type_name'] =  $_GET['book_type_name'];
    	$book = new BookModel();
    	$ass  = $book ->upd($id,$data);
    	//判断
    	if($ass)
    	{
    		echo '<script>alert("修改成功");location.href="'.'see'.'";</script>';
    	}else{
    		echo '<script>alert("修改失败");location.href="'.'see'.'";</script>';
    	}
    }

    //批量移除
	public function del2()
	{
		//接值
		$id = $_GET['id'];
		$str = explode(",",$id);
		foreach($str as $v){
		DB::table('book_type')->where('book_type_id',"=","$v")->delete();
		}
		return redirect()->action('home\BookController@book_see');
	}

	//添加图书页
	public function add_book()
	{
		$book = new BookModel();
		$data = $book ->show();
		$data = json_decode($data); 
		$see  = $this ->digui($data);
		return view('home/add_book',['see'=>$see]);
	}

	//添加图书
	public  function books()
	{
		//接值
		$data['book_message_name'] = $_POST['book_message_name'];
		$data['book_type_id']      = $_POST['book_type_id'];
		$data['book_message_buy']  = $_POST['book_message_buy'];
		$data['book_message_loan'] = $_POST['book_message_loan'];
		$data['book_message_num']  = $_POST['book_message_num'];
		//判断为否为空
		foreach ($data as $key => $value) 
		{
          if(empty($value))
          {
          	echo '<script>alert("所有内容不能为空");location.href="'.'add_book'.'";</script>';
          }
        }
        
	    //文件上传
        $file = Input::file('book_message_img');

        if($file -> isValid()){
            //检验一下上传的文件是否有效.
            $clientName = $file -> getClientOriginalName();//初始名
            $tmpName = $file ->getFileName();//获取tmp文件下的文件名
            $realPath = $file -> getRealPath();//缓存在tmp文件夹下的文件的绝对路径
            $entension = $file -> getClientOriginalExtension();//上传后的文件后缀
            $newName = md5(date('ymdhis').$clientName).".".$entension;//文件上传的名

            $path = $file -> move('uploads',$newName);

        }
            $data['book_message_img']='uploads/'.$newName;

        $book = new BookModel();
        $ass  = $book ->add_books($data);
        //判断
        if($ass){
        	echo '<script>alert("添加成功");location.href="'.'books_show'.'";</script>';
        }else{
        	echo '<script>alert("添加失败");location.href="'.'add_book'.'";</script>';

        }
    }


      // 图书展示
         public function books_show()
{
      $bookmodel = new BookModel();
      $book_type  = $bookmodel->select_booktype();
      $book_type  = json_decode($book_type);
      $book_type  = $this->digui($book_type);


      $page = Input::get("page",1 );
      $size = 4;
      $limit = ($page-1)*$size;
      //接图书名称
      $book_message_name = Input::get("book_message_name","");
      //接分类id   
      $book_type_id      = Input::get("book_type_id","");
      //查询图书
      foreach($book_type as $k =>$v)
      {
       
          if($v->book_type_id == $book_type_id)
          {
            $v->selected="selected";
          }
          else
          {
            $v->selected="";
          }
      }
      
      
      $data['num']      = $bookmodel->select_count($book_message_name,$book_type_id);
      $data['num_page'] = ceil($data['num']/$size);
      $data['up']       = $page-1<1?$page:$page-1;
      $data['next']     = $page+1>$data['num_page']?$page:$page+1;
      $book             = $bookmodel->select_book($book_message_name,$book_type_id,$limit,$size);
      
      return view("home/books_show",['book_type'=>$book_type,'book'=>$book,"book_message_name"=>$book_message_name,"book_type_id"=>$book_type_id,"data"=>$data]);
}



    //图书单删
    public function books_del()
    {
    	$id   = $_GET['id'];
    	$book = new BookModel();
    	$ass  = $book -> books_del($id);
    	//判断
    	if($ass){
    		echo '<script>alert("删除成功");location.href="'.'books_show'.'";</script>';
    	}else{
    		echo '<script>alert("删除失败");location.href="'.'books_show'.'";</script>';
    	}
    }


    public function books_update()
    {
    	$id   = $_GET['id'];
    	$book = new BookModel();
    	$ass  = $book ->books_update($id);
    	$ass=get_object_vars($ass);
    	//print_r($ass);die;
    	$data = $book ->show();
		  $data = json_decode($data); 

		  $see  = $this ->digui($data);
		  //print_r($see);die;
		  //判断查询的值是否和递归里的值 一致
		  foreach ($see as $key => $val) 
      {
    			if($ass['book_type_id']==$val->book_type_id)
    			{
    				$val->selected="selected";
    			}
    			else
    			{
    				$val->selected="";
    			}
		  }
		return view('home/book_modification',['ass'=>$ass,'see'=>$see]);

    }


    public function books_books()
    {
    	//接值
    	$id = $_GET['id'];
    	$data['book_message_name'] = $_GET['book_message_name'];
    	$data['book_type_id']      = $_GET['book_type_id'];
    	$data['book_message_buy']  = $_GET['book_message_buy'];
    	$data['book_message_loan'] = $_GET['book_message_loan'];
    	$data['book_message_num']  = $_GET['book_message_num'];
    	$data['book_message_img']  = $_GET['book_message_img'];
    	$book = new BookModel();
		$ass  = $book -> books_books($id,$data);  
		//判断
		if($ass){
			echo '<script>alert("修改成功");location.href="'.'books_show'.'";</script>';
		}else{
			echo '<script>alert("修改失败");location.href="'.'books_update'.'";</script>';
		}
    }


    //图书批量移除
  	public function del3()
  	{
  		//接值
  		$id = $_GET['id'];
  		$str = explode(",",$id);
  		foreach($str as $v){
  		DB::table('book_message')->where('book_message_id',"=","$v")->delete();
  		}
  		echo '<script>alert("删除成功");location.href="'.'books_show'.'";</script>';
  	}


}

?>