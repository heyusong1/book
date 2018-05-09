<?php  
 
namespace App\Http\Controllers\admin;  
  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Model\OrderModel; 
use Symfony\Component\HttpFoundation\Session\Session;



class OrderController extends Controller  
{  
	 public function order()
   {
      $session         = new Session();
      $admin_user_id   = $session->get("admin_user_id");
      if(empty($admin_user_id))
      {
          echo '<script>alert("请先登录");location.href="'.'login'.'";</script>';die;
      }
      $book_message_id = Input::get("book_message_id");
      if(empty($book_message_id))
      {
          echo '<script>alert("请选择正确的书籍");location.href="'.'adminindex'.'";</script>';die;
      }
      //查询有没有本书籍
      $OrderModel = new OrderModel();
      $book       = $OrderModel->select_one_book($book_message_id);
      if(empty($book))
      {
         echo '<script>alert("请选择正确的书籍");location.href="'.'adminindex'.'";</script>';die;
      }
      //查询用户是否预约本书籍
      $is_order  = $OrderModel ->select_is_order($admin_user_id,$book_message_id);
      if(!empty($is_order))
      {
        echo '<script>alert("您已经预约过本书，请不要重复预约");location.href="'.'adminindex'.'";</script>';die;
      }
      //查询用户借阅和预约了多少本书
      $loan_num  = $OrderModel -> select_loan_num($admin_user_id);
      $order_num = $OrderModel -> select_order_num($admin_user_id);
      
      if($loan_num+$order_num>=5)
      {
        echo '<script>alert("您借阅和预约的书已经够5本，暂时不能预约，可归还其他书籍或取消其他预约");location.href="'.'adminindex'.'";</script>';die;
      }



      $data['admin_user_id']   = $admin_user_id;
      $data['book_message_id'] = $book_message_id;
      $data['order_time']      = time();
      $order                   = $OrderModel->insert_order($data); 
      if($order)
      {
          echo '<script>alert("预约成功，稍后我们的管理员会与你联系");location.href="'.'adminindex'.'";</script>';die;
      }

   }
}  