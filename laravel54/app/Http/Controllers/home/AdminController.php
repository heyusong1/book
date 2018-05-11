<?php  
 
namespace App\Http\Controllers\home;  
  
use App\Http\Controllers\Controller; 
use App\Model\AdminModel;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;


class AdminController extends Controller  
{
    public $Admin;
    public function __construct(){
        $this->Admin=new AdminModel();// 实例化model
    }
    //管理员添加
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
    //管理员展示
       public function admin_show_user()
     {
         $data=$this->Admin->show();
        return view("home/main_message",['data'=>$data]);
     }
    public function user_show_one()
    {
         $home_user_id = Input::get('home_user_id');
        $data=$this->Admin->show_one($home_user_id);
        return view("home/main_show",['data'=>$data]);
    }
//管理员信息
     public function user_update_one()
     {
         $home_user_id = Input::get('home_user_id');
         $row=$this->Admin->update_one($home_user_id);
         return view("home/main_show_update",['row'=>$row]);
     }
//管理员删除
    public function admin_delect()
    {
        $home_user_id = Input::get('home_user_id');
        $res=$this->Admin->delRow($home_user_id);

        if($res){
            echo '<script>alert("删除成功");location.href="'.'home_show_admin'.'";</script>';
        }
        else
        {
            echo '<script>alert("删除失败");location.href="'.'home_show_admin'.'";</script>';
        }
    }

      public function updates(){
        $home_user_id = Input::get('home_user_id');
        $data=$this->Admin->getRow($home_user_id);
        return view('home/main_show',['data'=>$data]);
    }
    //用户展示
      public function user_show_a()
    {
        return view("home/user_show");
    }
    //管理员修改密码
    public function admin_change_password()
    {
        return view("home/main_change");
    }

    public function admin_change_pwd()
    {
        $home_user_password=md5(Input::get('home_user_password'));
        $home_user_password1=md5(Input::get('home_user_password1'));
        $pwd=md5(Input::get('pwd'));
        $session = new Session();
        $home_user_id=$session->get('home_user_id');
        $data=$this->Admin->show_pwd($home_user_id);

        if($home_user_password!= $data->home_user_password)
        {

            echo '<script>alert("原密码输入错误");location.href="'.'home_change_password'.'";</script>';die;
        }
        if(md5($home_user_password1) == md5($pwd) )
        {
            $reg=$this->Admin->update_pwd($home_user_id,$pwd);
            if ($reg)
            {
                echo '<script>alert("修改成功");location.href="'.'home_change_password'.'";</script>';
            }
            else
            {
                echo '<script>alert("修改失败");location.href="'.'home_change_password'.'";</script>';
            }

        }
        else
        {
            echo '<script>alert("两次密码不一致");location.href="'.'home_change_password'.'";</script>';
        }


    }
     public function show_one_user()
    {
         $user_show_id = Input::get('user_show_id');
        $data=$this->Admin->user_show($user_info_id);
        return view("home/user_shwo_one",['data'=>$data]);
    }

}