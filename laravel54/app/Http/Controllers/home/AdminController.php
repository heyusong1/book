<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
use App\Model\AdminModel;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller  
{
    public $Admin;
    public function __construct(){
        $this->Admin=new AdminModel();// 实例化model
    }
	public function admin_insert_user()
     {
        return view("home/main_info");
     }
    public function  insert_user()
    {
        $data = Input::all();
        $home_user_img=Input::file('home_user_img');
        $data['home_user_img'] = $this->Admin->uploads($home_user_img);
        $res=$this->Admin->insert($data);
        if($res){
            echo '<script>alert("添加成功");location.href="'.'home_show_admin'.'";</script>';
        }
    }
       public function admin_show_user()
     {
         $data=$this->Admin->show();
        return view("home/main_message",['data'=>$data]);
     }
    public function user_show_one()
    {
        $data=$this->Admin->show_one();
        return view("home/main_show",['data'=>$data]);
    }
       public function admin_change_password()
     {
        return view("home/main_change");
     }
       public function main_list()
     {
        return view("home/main_list");
     }
     public function main_menu()
     {
        return view("home/main_menu");
     }
      public function main()
     {
        return view("home/main");
     }
     public function user_update_one()
     {
         $home_user_id = Input::get('home_user_id');
         $row=$this->Admin->update_one($home_user_id);
         return view("home/main_show_update",['row'=>$row]);
     }
     
   
}