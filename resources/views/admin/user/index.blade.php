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
					<h3 class="title1">用户管理</h3>
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
						<form action="/admin/user/index" method="get">
						用户名：<input type="text" name="keyword" value="{{$keyword}}"> 
						<input type="submit" value="搜索">
						</form>
						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th>ID</th>
						      <th>用户名</th>
						      <th>头像</th>
						      <th>邮箱</th>
								<th>状态</th>
								<th>创建时间</th>
								<th>操作</th>
						  	</tr>
						  </thead>
						  <tbody>
						  	@foreach($data as $k=>$v)
						    <tr>
						      <th scope="row">{{ $v->id }}</th>
						      <td>{{$v->uname}}</td>
						      <td><img style="width:50px;" src="/uploads/{{$v->profile}}"></td>
						      <td>{{$v->email}}</td>
						      <td>
						      @if($v->status == 0)
						      <kbd>未激活</kbd>
						      @else 
						      <kbd style="background: #5cb85c">激活</kbd>
						      @endif
						      </td>
						      <td>{{$v->created_at}}</td>
						      <td>
								<a href="/admin/user/destroy/{{$v->id}}/{{$v->token}}" >删除</a>
								<a href="/admin/user/edit/{{$v->id}}" >修改</a>
						      </td>

						  </tr>
						    @endforeach
						  </tbody>
						</table>
						{{$data->appends(['keyword'=>$keyword])->links()}}
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
		<script>
			// var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
			// 	showLeftPush = document.getElementById( 'showLeftPush' ),
			// 	body = document.body;
				
			// showLeftPush.onclick = function() {
			// 	classie.toggle( this, 'active' );
			// 	classie.toggle( body, 'cbp-spmenu-push-toright' );
			// 	classie.toggle( menuLeft, 'cbp-spmenu-open' );
			// 	disableOther( 'showLeftPush' );
			// };
			
			// function disableOther( button ) {
			// 	if( button !== 'showLeftPush' ) {
			// 		classie.toggle( showLeftPush, 'disabled' );
			// 	}
			// }
		</script>
	<!--scrolling js-->
	<!-- <script src="/admin/js/jquery.nicescroll.js"></script> -->
	<!-- <script src="/admin/js/scripts.js"></script> -->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="/admin/js/bootstrap.js"> </script>
</body>
</html>