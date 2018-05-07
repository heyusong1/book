<?php  
 
namespace App\Http\Controllers\admin;  
  
use App\Http\Controllers\Controller; 
use App\Model\LoginModel; 
use Illuminate\Http\Request;

  
class LoginController extends Controller  
{  
	function __construct()
	{
		
	}
   public function login()
   {
        return view('login/login');
   }
   public function validation()
   {
   	    $loginmodel = new LoginModel();
   		$tel = $_GET['admin_user_tel'];
   		$res = $loginmodel->select_one("admin_user","admin_user_tel",$tel);
   		if($res)
   		{
   			echo 1;//1代表手机号已经存在
   			die;
   		}
   		$code       = rand(1000,9999);
        $code_state = $this->telcode($tel,$code);//调用短信接口

        if ($code_state->code == 2) {

            
            session(['code' => $code]);
            echo 3;//发送验证码成功
            exit;
        }else{
            echo 2;//发送验证码失败 提示系统繁忙
            exit;
        }
   		
   }
   public function add_user()
   {
      echo 111;die;
   }
   public function telcode($tel,$code)
   {
   		$account  = "C69436975";
        $apikey   = "330dcdef0e247a96fc41082cb9551391";
        $url      = "http://106.ihuyi.com/webservice/sms.php?method=Submit&account={$account}&password={$apikey}&mobile={$tel}&format=json&content=您的验证码是：{$code}。请不要把验证码泄露给其他人。";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $mess=curl_exec($ch);
        curl_close($ch);
        $messdata = json_decode($mess);

        return $messdata;
   }
}  