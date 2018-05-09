<?php  
 
namespace App\Http\Controllers\admin;  
  
use App\Http\Controllers\Controller; 
use App\Model\UserModel; 
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
  
class UserController extends Controller  
{  
	 public function user()
   {
      $Session       = new Session();
      $admin_user_id = $Session->get("admin_user_id");
      if(empty($admin_user_id))
      {
         echo '<script>alert("请先登录");location.href="'.'login'.'";</script>';die;
      }  
      //查询该用户是否完善信息
      $UserModel = new UserModel();
      $userinfo  = $UserModel->selece_userInfo($admin_user_id);
      if(empty($userinfo))
      {
        echo '<script>alert("请完善信息");location.href="'.'finishinfo'.'";</script>';die;
      } 
      //查询用户所有信息
      $userdata  = $UserModel->selece_userdata($admin_user_id);
      return view("Login/userinfo",['userdata'=>$userdata]);
   }
   public function finishinfo()
   {
      return view("Login/finishinfo");
   }
   public function adduserinfo()
   {
      $Session               = new Session();
      $data                  = Input::all();
      $data['admin_user_id'] = $Session->get("admin_user_id");
      
      foreach ($data as $key => $value) {
      if(empty($value))
      {
        echo '<script>alert("所以内容不能为空");location.href="'.'finishinfo'.'";</script>';die;
      }
      }
      $email="/^\w{2,}@\w{2,}\.(com|cn|net)$/";
      if(!preg_match($email,$data['user_info_email']))
      {
        echo '<script>alert("请输入正确的邮箱格式");location.href="'.'finishinfo'.'";</script>';die;
      }
      $idcard="/^(\d{15}|\d{17}|\d{17}[0-9x])$/";
      if(!preg_match($idcard,$data['user_info_id_card']))
      {
        echo '<script>alert("请输入正确的身份证号");location.href="'.'finishinfo'.'";</script>';die;
      }
      $UserModel = new UserModel();
      $res       = $UserModel->insert_user($data);
      if($res)
      {
         echo '<script>alert("信息完善成功");location.href="'.'adminuser'.'";</script>';die;
      }
      else
      {
        echo '<script>alert("信息完善失败");location.href="'.'finishinfo'.'";</script>';die;
      }
   }
}  