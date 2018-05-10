<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
// use App\Model\LoginModel; 
use Illuminate\Http\Request;

  
class IndexController extends Controller  
{  
<<<<<<< HEAD
=======
    public $Admin;
    public function __construct(){
        $this->Admin=new AdminModel();// 实例化model
    }
>>>>>>> 6549cf411779661e1cb291ffcbd1c4b6d321a13e
	   public function index()
     {
        return view("home/index");
     }
     //底部
     public function bottom()
     {
        return view("home/bottom");
     }
     //左部
     public function left()
     {
        return view("home/left");
     }
     //推送菜单
     public function swich()
     {
        return view("home/swich");
     }
     //顶部
     public function top()
     {
        return view("home/top");
     }
     //添加管理
    public function main_info()
    {
        return view("home/main_info");
    }
    //系统展示
    public function one()
    {
      $Session=new Session();
      $id=$Session->get('home_user_id');
      $data=$this->Admin->admin_one($id);
        return view("home/main",['data'=>$data]);
    }
}  