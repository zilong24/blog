<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data = DB::table('articles')->paginate(5);

        //标签云
        $tagnames = DB::table('tagnames')->get();

        $ids = array_column($tagnames->toArray(),'id');

        $tagnames = array_combine($ids,$tagnames->toArray());

        //板块
        $cates = DB::table('cates')->get();

        $cates = array_combine( array_column($cates->toArray(),'id'),$cates->toArray() );

        //显示列表页面
        return view('admin/article/index',['data'=>$data,'tagnames'=>$tagnames,'cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取数据
        $tagnames = DB::table('tagnames')->get();

        return view('admin.article.create',['tagnames'=>$tagnames,'cates'=>self::getCates()]);
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
        //接收数据
        $data = $request->except(['_token','thumb']);

        //检查上传文件
        if($request->hasFile('thumb')){
            $data['thumb'] = $request->file('thumb')->store(date('Ymd'));
        }else{
            $data['thumb'] = '';
        }

        $data['ctime'] = date('Y-m-d H:i:s');

        //数据入库
        $res = DB::table('articles')->insert($data);
        if($res === false){
            return back()->with('error','添加失败');
        }

        return redirect('/admin/article/index')->with('success','添加成功');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //获取详情
        $data = DB::table('articles')->where('id',$id)->first();

        echo json_encode($data);die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
