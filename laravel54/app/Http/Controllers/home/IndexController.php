<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
// use App\Model\LoginModel; 
use Illuminate\Http\Request;

  
class IndexController extends Controller  
{  
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
        return view("home/left");
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