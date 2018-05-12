<?php
namespace App\Http\Controllers\home;  

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Input;
use App\Http\Models\BorrowingModel;
use Illuminate\Support\Facades\DB;  
use Symfony\Component\HttpFoundation\Session\Session;


class BorrowingController extends Controller{
	public function examine(){
		$data = DB::table('loan_book')
			->where(['book_state'=>'0'])
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
            ->paginate(5);
	        return view('home\borrowing\borrowing_examine',['data'=>$data]);
	}

	public function examine_show(){
		$get=$_GET;
		if(empty($get['admin_user_name'])){
			session_start();
			$admin_user_name = $_SESSION['admin_user_name'];
		}else{
			$admin_user_name = $get['admin_user_name'];
			session_start();
			$_SESSION['admin_user_name'] = $get['admin_user_name'];
		}
		$data = DB::table('loan_book')
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
			->where(['book_state'=>'0'])
            ->where('admin_user.admin_user_name','like','%'.$admin_user_name.'%')          
            ->paginate(5);
	    return view('home\borrowing\borrowing_examine',['data'=>$data]);		
	}

	public function e_b(){
		$loan_book_id = $_GET['loan_book_id'];
		$e_b = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->update(array("book_state"=>1));
		$book_message_id = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->select('book_message_id')->first();
		$book_message_id = $book_message_id->book_message_id;
		$sql = "update book_message set book_message_num = book_message_num-1 where book_message_id = $book_message_id";
		$reduce =  DB::update("$sql");
		if($e_b&&$reduce){
			return redirect('borrowing/examine');
		}
	}

	public function borrowed(){
		$data = DB::table('loan_book')
			->where(['book_state'=>'1'])
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
            ->paginate(5);
        return view('home\borrowing\borrowed',['data'=>$data]);	
	}

	public function borrowed_show(){
		$get=$_GET;
		if(empty($get['admin_user_name'])){
			session_start();
			$admin_user_name = $_SESSION['admin_user_name'];
		}else{
			$admin_user_name = $get['admin_user_name'];
			session_start();
			$_SESSION['admin_user_name'] = $get['admin_user_name'];
		}
		$data = DB::table('loan_book')
			->where(['book_state'=>'1'])
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
            ->where('admin_user.admin_user_name','like','%'.$admin_user_name.'%')          
            ->paginate(5);
	        return view('home\borrowing\borrowed',['data'=>$data]);		
	}

	public function b_r(){
		$loan_book_id = $_GET['loan_book_id'];
		$b_r = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->update(array("book_state"=>2));
		if($b_r){
			return redirect('borrowing/borrowed');
		}		
	}

	public function revert(){
		$data = DB::table('loan_book')
			->where(['book_state'=>'2'])
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
            ->paginate(5);
        return view('home\borrowing\revert',['data'=>$data]);			
	}

	public function revert_show(){
		$get=$_GET;
		if(empty($get['admin_user_name'])){
			session_start();
			$admin_user_name = $_SESSION['admin_user_name'];
		}else{
			$admin_user_name = $get['admin_user_name'];
			session_start();
			$_SESSION['admin_user_name'] = $get['admin_user_name'];
		}
		$data = DB::table('loan_book')
			->where(['book_state'=>'2'])
            ->join('admin_user', 'loan_book.admin_user_id', '=', 'admin_user.admin_user_id')
            ->join('book_message', 'loan_book.book_message_id', '=', 'book_message.book_message_id')
            ->select('loan_book.*', 'admin_user.admin_user_name', 'book_message.book_message_name')
            ->where('admin_user.admin_user_name','like','%'.$admin_user_name.'%')          
            ->paginate(5);
	        return view('home\borrowing\revert',['data'=>$data]);		
	}

	public function r_p(){
		$loan_book_id = $_GET['loan_book_id'];
		$r_p = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->update(array("book_state"=>3));
		$book_message_id = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->select('book_message_id')->first();
		$book_message_id = $book_message_id->book_message_id;
		$sql = "update book_message set book_message_num = book_message_num+1 where book_message_id = $book_message_id";
		$increase =  DB::update("$sql");
        if($r_p&&$increase){
        	return redirect('borrowing/revert');
        }
	}

	public function r_n(){
		$loan_book_id = $_GET['loan_book_id'];
		$r_n = DB::table('loan_book')->where(['loan_book_id'=>$loan_book_id])->update(array("book_state"=>4));
        if($r_n){
        	return redirect('borrowing/revert');
        }
	}

	public function borrow(){
    	$book_message_id = $_GET['book_message_id'];
    	//session获取用户id
    	$Session       = new Session();
        $admin_user_id = $Session->get("admin_user_id");
    	//本地时间戳
    	$loan_book_time = time();
    	$data = array(
    		'book_message_id' => $book_message_id,
    		'admin_user_id'   => $admin_user_id,
    		'loan_book_time'  => $loan_book_time
    	);
        $res = DB::table('loan_book')->insert($data);
        if ($res) {
          echo '<script>alert("借阅成功");location.href="'.'adminindex'.'";</script>';
        }else{
      		echo "<script>alert('系统繁忙，请稍后再试');history.go(-1);</script>";
        }
    }  
}