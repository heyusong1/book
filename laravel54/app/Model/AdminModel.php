<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Storage;//文件上传

class AdminModel extends Model
{
    protected $tableName = 'home_user';
    //管理员添加
    public function insert($input)
    {
        //添加数据
        $data['home_user_name'] = $input['home_user_name'];
        $data['home_user_password'] = md5($input['home_user_password']);
        $data['home_user_email'] = $input['home_user_email'];
        $data['home_user_state'] = $input['home_user_state'];
        $data['home_user_img'] = $input['home_user_img'];
        $data['home_user_matt'] = $input['home_user_matt'];
        return DB::table($this->tableName)->insert($data);
    }
    //照片添加
    public function uploads($home_user_img)
    {
        if ($home_user_img->isValid()) {
            $originalName = $home_user_img->getClientOriginalName();
            //扩展名
            $ext = $home_user_img->getClientOriginalExtension();
            //MimeType
            $type = $home_user_img->getClientMimeType();
            //临时绝对路径
            $realPath = $home_user_img->getRealPath();
            $filename = uniqid() . '.' . $ext;
            //  print_r($filename);die;
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            $path = "../uploads/" . $filename;
        }
        return $path;
    }
    //管理员展示
    public function show()
    {
        //查询所有数据
        return DB::table($this->tableName)->get();
    }
  
    public function update_one($home_user_id)
    {
        $row=DB::table($this->tableName)->where(['home_user_id'=>$home_user_id])->first();
        return $row;
    }
    //后台登录
    public function one_login($home_user_name,$home_user_password)
    {

        return DB::table($this->tableName)->where('home_user_name',$home_user_name)->where("home_user_password",$home_user_password)->first();
    }
    //左部用户展示
    public function img($home_user_id)  
    {
        return DB::table($this->tableName)->where('home_user_id',$home_user_id)->first();
    }
    //管理员删除
     public function delRow($home_user_id){
        //删除
        return DB::table($this->tableName)->where(['home_user_id'=>$home_user_id])->delete();
    }
    //管理员查询
    public function getRow($home_user_id){
        //查询一条数据
        $row=DB::table($this->tableName)->where(['home_user_id'=>$home_user_id])->first();
        return $row;
    }
    //系统管理员展示
    public function admin_one($home_user_id)  
    {
        return DB::table($this->tableName)->where('home_user_id',$home_user_id)->first();
    }


}
