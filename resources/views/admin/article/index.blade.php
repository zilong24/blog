<!DOCTYPE HTML>
<html>
<head>
<title>{{Config::get('app.title')}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

@include('admin.index.common')

<!-- 配置文件 -->
<script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ueditor/ueditor.all.js"></script>

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@include('admin.index.menu')
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		@include('admin.index.header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper" >
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">文章管理</h3>
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					
					<div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
						
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th>ID</th>
						      <th>基本信息</th>
								<th>标签云</th>
								<th>文章板块</th>
								<th>缩略图</th>
								<th>创建时间</th>
								<th>操作</th>
						  	</tr>
						  </thead>
						  <tbody>
						  	@foreach($data as $k=>$v)
						    <tr>
						      <th scope="row">{{ $v->id }}</th>
						      <td>
						      	<p>标题：{{$v->title}}</p>
						      	<p>作者：{{$v->auth}}</p>
						      	<p>阅读量：{{$v->num}}</p>
						      	<p>点赞数：{{$v->goodnum}}</p>
						      </td>
						      
						      <td>
						      	<button type="button" style="background-color: {{$tagnames[$v->tid]->bgcolor}};">{{$tagnames[$v->tid]->tagname}}</button>
						      </td>
						      <td>
						      	{{$cates[$v->cid]->cname}}
								
						      </td>
						      <td><img style="width: 100px;" src="/uploads/{{$v->thumb}}" title="{{$v->desc}}"></td>
						      <td>
						      	
						      	<p>{{$v->ctime}}</p>
						      </td>
						      <td>
								<a href="/admin/user/destroy/{{$v->id}}" class="btn btn-danger" >删除</a>
								<a href="/admin/user/edit/{{$v->id}}" class="btn btn-warning" >修改</a>
								<a href="javascript:;" class="btn btn-info detail" data-id="{{$v->id}}" >查看详情</a>
						      </td>

						  </tr>
						    @endforeach
						  </tbody>
						</table>
						{{$data->links()}}
					</div>
					
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>Copyright &copy; 2016.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
        <!--//footer-->
	</div>
	
	<script src="/admin/js/bootstrap.js"> </script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      	<h4>作者：<span class="auth"></span></h4>
      	<hr>
		<!-- 加载编辑器的容器 -->
		<script id="content" name="content" type="text/plain">

		</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
	var ue = UE.getEditor('content',{
        	toolbars: [
		        ['fullscreen']
		    ]});
})

$('table').on('click','.detail',function(){
	$.post('/admin/article/show/'+$(this).data('id'),{},function(res){
		console.log(res)
		$('.modal-title').text(res.title);
		$('.modal-body').find('.auth').text(res.auth);
		$('#content').text(res.content);

		

		$('#myModal').modal('show');
	},'json');
	
});
</script>

</body>
</html>