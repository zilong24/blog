<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cate.index',['cates'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.create',['cates'=>self::getCates()]);
    }

    public static function getCates(){
        //获取原有的分类
        $data = DB::table('cates')->orderBy('path','asc')->get();
        foreach($data as $k=>$v){
            if($v->pid > 0){
                $v->cname = '|----'.$v->cname;
            }

            $data[$k] = $v;
        }

        //将二维数组data的 id字段作为一个新数组
        $ids = array_column($data->toArray(),'id');

        //将新数组作为 原数组的索引
        $data = array_combine($ids,$data->toArray());

        return $data;
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
        $data = $request->except(['_token']);

        //数据入库
        $id = DB::table('cates')->insertGetId($data);

        //修改path
        $res = DB::table('cates')->where('id',$id)->update(['path'=>$data['path'].','.$id]);

        if($res === false){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/cate/index')->with('success','添加成功');

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
        //获取原来的数据显示
        $data = DB::table('cates')->where('id',$id)->first();

        //显示修改页面
        return view('admin.cate.edit',['data'=>$data,'cates'=>self::getCates()]);
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

        $data['path'] .= ','.$id;

        //修改数据
        $res = DB::table('cates')->where('id',$id)->update($data);

        if($res === false){
            return back()->with('error','修改失败');
        }

        return redirect('/admin/cate/index')->with('success','修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除之前先判断是否有子分类，如果有，不允许删除
        $res = DB::table('cates')->where('pid',$id)->first();

        if(!empty($res)){
            return back()->with('error','该分类下有子分类，不允许删除');
        }

        $res = DB::table('cates')->where('id',$id)->delete();
        if($res === false){
            return back()->with('error','删除失败');
        }

        return redirect('/admin/cate/index')->with('success','删除成功');

    }
}
