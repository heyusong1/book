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
      //查询用户信息是否完善
      $OrderModel = new OrderModel();
      $user_info  = $OrderModel->user_info($admin_user_id);
      if(empty($user_info))
      {
         echo '<script>alert("请先完善个人信息");location.href="'.'finishinfo'.'";</script>';die;
      } 
      $book_message_id = Input::get("book_message_id");
      // echo $book_message_id;die;
      if(empty($book_message_id))
      {
          echo '<script>alert("请选择正确的书籍");location.href="'.'adminindex'.'";</script>';die;
      }
      //查询有没有本书籍
      
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
      //查询用户是否借阅本书籍
      $is_loan  = $OrderModel ->select_is_loan($admin_user_id,$book_message_id);
      if(!empty($is_loan))
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
   public function orderbook()
   {
       $OrderModel = new OrderModel();
       //查询所有书籍
       $allbook    = $OrderModel->select_allbook();
       $allbook    = json_decode($allbook);
       $allorder   = $OrderModel->select_allorder();
       foreach ($allbook as $key => $value) {
         foreach ($allorder as $k => $v) {
           if($v->book_message_id == $value->book_message_id)
           {
              $v->book_message_name = $value->book_message_name;
              $v->book_message_num  = $value->book_message_num;
           }
         }
       }
       return view("home/order_book",['allorder'=>$allorder]);
   }
   public function allocation()
   {
      $order_id=Input::get("order_id");
      if(empty($order_id))
      {
        echo '<script>alert("选择不正确");location.href="'.'orderbook'.'";</script>';die;
      }
      $OrderModel      = new OrderModel();
      //查询单条预约
      $order_book      = $OrderModel->order_book($order_id);
      $book_message_id = $order_book->book_message_id; 
      //查询单条图书
      $one_book        = $OrderModel->one_book($book_message_id);
      if($one_book->book_message_num==0)
      {
        echo '<script>alert("暂无书籍，请稍后再来");location.href="'.'orderbook'.'";</script>';die;
      }
      $data['admin_user_id']   = $order_book->admin_user_id;
      $data['book_message_id'] = $book_message_id;
      $data['loan_book_time']  = time();
      $res = $OrderModel->insert_loan($data);
      if($res)
      {
        $book_message_num = $one_book->book_message_num-1;
        $reg              = $OrderModel->update_num($book_message_id,$book_message_num);
        $arr              = $OrderModel->del_order($order_id);
        if($reg)
        {
           echo '<script>alert("分配成功");location.href="'.'orderbook'.'";</script>';die;
        }
        else
        {
          echo '<script>alert("分配失败，请再次分配");location.href="'.'orderbook'.'";</script>';die;
        }
       
      }
      else
      {
        echo '<script>alert("分配失败，请再次分配");location.href="'.'orderbook'.'";</script>';die;
      }

   }
   
}  