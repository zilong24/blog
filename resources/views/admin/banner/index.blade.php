<!DOCTYPE HTML>
<html>
<head>
<title>{{Config::get('app.title')}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

@include('admin.index.common')

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
					<h3 class="title1">轮播图管理</h3>
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
						
						</form>
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th>ID</th>
						      <th style="max-width: 50px;">标题</th>
						      <th>图片</th>
						      <th>链接</th>
								<th>状态</th>
								<th>操作</th>
						  	</tr>
						  </thead>
						  <tbody>
						  	@foreach($data as $k=>$v)
						    <tr>
						      <th scope="row">{{ $v->id }}</th>
						      <td style="max-width: 150px;" >{{$v->title}}</td>
						      <td><img title="{{$v->desc}}" style="width:150px;" src="/uploads/{{$v->profile}}"></td>
						      <td>{{$v->url}}</td>
						      <td>
						      @if($v->status == 0)
						      <kbd onclick="changeStatus({{$v->id}},{{$v->status}})">未激活</kbd>
						      @else 
						      <kbd style="background: #5cb85c" onclick="changeStatus({{$v->id}},{{$v->status}})">激活</kbd>
						      @endif
						      </td>
						      <td>
								<a class="btn btn-danger" href="/admin/banner/destroy/{{$v->id}}" >删除</a>
								<a class="btn btn-warning" href="/admin/banner/edit/{{$v->id}}" >修改</a>
						      </td>

						  </tr>
						    @endforeach
						  </tbody>
						</table>
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
	<!-- Classie -->
		<!-- <script src="/admin/js/classie.js"></script> -->
		
	<!--scrolling js-->
	<!-- <script src="/admin/js/jquery.nicescroll.js"></script> -->
	<!-- <script src="/admin/js/scripts.js"></script> -->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="/admin/js/bootstrap.js"> </script>

	

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">轮播图状态</h4>
      </div>
      <div class="modal-body">
        启用：<input type="radio" name="status" value="1">
        关闭：<input type="radio" name="status" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="active" >保存</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function changeStatus(id,status){
		$('#myModal').find('input[name=status]').each(function(k,v){
			if($(v).val() == status){
				$(v).prop('checked',true);
			}
		});

		//保存id
		$('#myModal').find('#active').attr('data-id',id);

		$('#myModal').modal('show');
	}

	$('#active').on('click',function(){
		let params = {
			id:$('#active').attr('data-id'),
			status:$('#myModal').find('input[name=status]:checked').val()
		};
		$.post('/admin/banner/active',params,function(res){
			alert(res);
			if(res == 'ok'){
				location.href = location.href;
			}
		});
	});
</script>
</body>
</html>