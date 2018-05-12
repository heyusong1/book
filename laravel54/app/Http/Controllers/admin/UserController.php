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
      // 查询借阅的书籍
      $loan_book  = $UserModel->select_loan($admin_user_id);
      $loan_book  = json_decode($loan_book);
      // var_dump($loan_book);die;
      //查询预约的书籍
      $order_book = $UserModel->select_order($admin_user_id);
      $order_book = json_decode($order_book);
      //查询用户所有信息

      $userdata   = $UserModel->selece_userdata($admin_user_id);
      return view("Login/userinfo",['userdata'=>$userdata,'loan_book'=>$loan_book,'order_book'=>$order_book]);
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
   public function updateuser()
   {
      $Session       = new Session();
      $admin_user_id = $Session->get("admin_user_id");
      if(empty($admin_user_id))
      {
         echo '<script>alert("请先登录");location.href="'.'login'.'";</script>';die;
      }  
      $UserModel = new UserModel();
      $userdata  = $UserModel->selece_userdata($admin_user_id);
      return view("Login/updateuser",['userdata'=>$userdata]);
   }
   public function updateuser_do()
   {
      $data = Input::all();
      
      foreach ($data as $key => $value) {
         if(empty($value))
         {
            echo '<script>alert("所以内容不能为空");location.href="'.'updateuser'.'";</script>';die;
         }
      }
       $email="/^\w{2,}@\w{2,}\.(com|cn|net)$/";
      if(!preg_match($email,$data['user_info_email']))
      {
        echo '<script>alert("请输入正确的邮箱格式");location.href="'.'updateuser'.'";</script>';die;
      }
       $idcard="/^(\d{15}|\d{17}|\d{17}[0-9x])$/";
      if(!preg_match($idcard,$data['user_info_id_card']))
      {
        echo '<script>alert("请输入正确的身份证号");location.href="'.'finishinfo'.'";</script>';die;
      }
      $Session       = new Session();
      $admin_user_id = $Session->get("admin_user_id");
      $UserModel     = new UserModel();
      $res           = $UserModel->updateuser($admin_user_id,$data); 
      if($res)
      {
         echo '<script>alert("修改成功");location.href="'.'adminuser'.'";</script>';die;
      }
      else
      {
         echo '<script>alert("修改失败");location.href="'.'updateuser'.'";</script>';die;
      }
   }
   public function delorder()
   {
      $order_id = Input::get("order_id");
      if(empty($order_id))
      {
          echo '<script>alert("请选择正确的信息");location.href="'.'adminuser'.'";</script>';die;
      }
      $Session       = new Session();
      $admin_user_id = $Session->get("admin_user_id");
      //查询单条预约
      $UserModel     = new UserModel(); 
      $one_order     = $UserModel->one_order($order_id);
      if($one_order->admin_user_id!=$admin_user_id)
      {
          echo '<script>alert("请选择自己的预约");location.href="'.'adminuser'.'";</script>';die;
      }
      //删除预约
      $res = $UserModel->del_order($order_id);
      if($res)
      {
          echo '<script>alert("取消成功");location.href="'.'adminuser'.'";</script>';die;
      }
      else
      {
          echo '<script>alert("取消失败");location.href="'.'adminuser'.'";</script>';die;
      }
   }
}  