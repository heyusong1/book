<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Storage;//文件上传

class AdminModel extends Model
{
    protected $tableName = 'home_user';

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
    public function show()
    {
        //查询所有数据
        return DB::table($this->tableName)->get();
    }
    public function show_one()
    {
        //查询所有数据
        return DB::table($this->tableName)->get();
    }
    public function update_one($home_user_id)
    {
        $row=DB::table($this->tableName)->where(['home_user_id'=>$home_user_id])->first();
        return $row;
    }


}