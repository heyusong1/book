<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
use App\Model\AdminModel; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

  
class IndexController extends Controller  
{  
    public $Admin;
    public function __construct(){
        $this->Admin=new AdminModel();// 实例化model
    }





































































































































































































    
	   public function index()
     {
        return view("home/index");
     }
     public function bottom()
     {
        return view("home/bottom");
     }
     public function left()
     {
      $Session=new Session();
      $id=$Session->get('home_user_id');
      $data=$this->Admin->img($id);
       return view("home/left",['data'=>$data]);
     }
     public function swich()
     {
        return view("home/swich");
     }
     public function top()
     {
        return view("home/top");
     }
    public function main_info()
    {
        return view("home/main_info");
    }
}  