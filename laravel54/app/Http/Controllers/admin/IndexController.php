<?php  
 
namespace App\Http\Controllers\admin;  
  
use App\Http\Controllers\Controller; 
use App\Model\IndexModel; 
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
  
class IndexController extends Controller  
{  
	 public function index()
   {
      $indexmodel = new IndexModel();
      $session    = new Session();
      $admin_id   = $session->get("admin_user_id");
      if(empty($admin_id))
      {
        $user['state']=0;
      }
      else
      {
        $arr = $indexmodel->select_user($admin_id);
        $user['state']=1;
        $user['user']=$arr->admin_user_name;
      }
      
      $book_type  = $indexmodel->select_booktype();
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
      
      $data['num']      = $indexmodel->select_count($book_message_name,$book_type_id);
      $data['num_page'] = ceil($data['num']/$size);
      $data['up']       = $page-1<1?$page:$page-1;
      $data['next']     = $page+1>$data['num_page']?$page:$page+1;
      $book             = $indexmodel->select_book($book_message_name,$book_type_id,$limit,$size);
      
      return view("Login/index",['book_type'=>$book_type,'book'=>$book,"book_message_name"=>$book_message_name,"book_type_id"=>$book_type_id,"data"=>$data,'user'=>$user]);
   }
   public function digui($data,$path=0,$f=1){
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
}  