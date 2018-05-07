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
     public function main()
     {
        return view("home/main");
     }
     public function main_list()
     {
        return view("home/main_list");
     }
     public function main_menu()
     {
        return view("home/main_menu");
     }
     public function main_message()
     {
        return view("home/main_message");
     }
     public function message_info()
     {
        return view("home/message_info");
     }
     public function message_reply()
     {
        return view("home/message_reply");
     }
     public function swich()
     {
        return view("home/swich");
     }
     public function top()
     {
        return view("home/top");
     }
}  