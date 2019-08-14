<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //接收参数
        $keyword = $request->input('keyword','');


        $data = DB::table('users')->where('uname','like','%'.$keyword.'%')->where('is_del',0)->paginate(5);
        //显示列表页面
        return view('admin.user.index',['data'=>$data,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收参数
        $data = $request->except(['profile','upass2']);

        //验证数据
        if(empty($data['uname'])){
            echo '用户名必填';die;
        }

        if(empty($data['upass'])){
            echo '密码必填';die;
        }

        if($data['upass'] != $request->input('upass2','')){
            echo '两次密码不一致';die;
        }
        

        //判断是否有文件上传
        if( $request->hasFile('profile') ){
            //有就上传
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }

        $data['profile'] = $path;

        $data['token'] = str_random(50);
        $time = date('Y-m-d H:i:s');
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

        //密码加密
        $data['upass'] = Hash::make($data['upass']);

        //数据入库
        $res = DB::table('users')->insert($data);
        if(!$res){
            echo 'error';die;
        }

        echo 'ok';die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        //显示修改页面
        return view('admin.user.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接收参数
        $data = $request->except(['_token']);

        //先查出数据
        $user = DB::table('users')->where('id',$id)->first();

        if($user->token != $data['token']){
            return back()->with('非法请求');
        }

        //检查文件上传
        if($request->hasFile('profile')){
            $data['profile'] = $request->file('profile')->store(date('Ymd'));
        }

        //修改
        $res = DB::table('users')->where('id',$id)->update($data);
        if(!$res){
            return back()->with('修改失败');
        }

        return redirect('/admin/user/index')->with('添加成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id,$token)
    {
        //DB::table('users')->where('id',$id)->delete();
        
        //删除之前先验证token
        $user = DB::table('users')->where('id',$id)->first();

        if($user->token != $token){
            return back()->with('error','非法请求');
        }

        //逻辑删除（软删除）
        $res = DB::table('users')->where('id',$id)->update(['is_del'=>1]);

        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/user/index')->with('success','删除成功');
        
    }
}
