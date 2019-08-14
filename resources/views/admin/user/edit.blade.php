<!DOCTYPE HTML>
<html>
<head>
<title>修改</title>
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
		<div id="page-wrapper">
			<div class="main-page">
				<h1 class="text-center text-info">修改用户</h1>
				<div id="msg" style="display:none;" class="alert alert-warning alert-dismissible fade in" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
			    </div>

				
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<form id="form1" action="/admin/user/update/{{$data->id}}" method="post" enctype="multipart/form-data">
				  {{csrf_field()}}
				  <input type="hidden" name="token" value="{{$data->token}}">
				  <div class="form-group">
				    <label for="uname" >用户名</label>
				    <input type="text" class="form-control" id="uname" name="uname" placeholder="" value="{{$data->uname}}">
				  </div>
				  
				  <div class="form-group">
				    <label for="email" >邮箱</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{$data->email}}">
				  </div>
				  <div class="form-group">
				    <label for="profile">头像</label>
				    <img style="width: 50px;" src="/uploads/{{$data->profile}}">
				    <input type="file" id="profile" name="profile" class="form-control">
				    
				  </div>
				  
				  <button type="submit" class="form-control btn btn-success">提交</button>
				</form>
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