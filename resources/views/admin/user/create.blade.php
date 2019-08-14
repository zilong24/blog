<!DOCTYPE HTML>
<html>
<head>
<title>Tables</title>
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
				<h1 class="text-center text-info">添加用户</h1>
				<form id="form1" action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
				  {{csrf_field()}}
				  <div class="form-group">
				    <label for="uname" >用户名</label>
				    <input type="text" class="form-control" id="uname" name="uname" placeholder="" value="{{old('uname')}}">
				  </div>
				  <div class="form-group">
				    <label for="upass">密码</label>
				    <input type="password" class="form-control" id="upass" name="upass" placeholder="" value="{{old('upass')}}">
				  </div>
				  <div class="form-group">
				    <label for="upass2">确认密码</label>
				    <input type="password" class="form-control" id="upass2" name="upass2" placeholder="" value="{{old('upass')}}">
				  </div>
				  <div class="form-group">
				    <label for="email" >邮箱</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">
				  </div>
				  <div class="form-group">
				    <label for="profile">头像</label>
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

	<script type="text/javascript">
	$('button[type=submit]').on('click',function(){
		// let params = {
		// 	uname:$('#uname').val(),
		// 	upass:$('#upass').val(),
		// 	upass2:$('#upass2').val(),
		// 	email:$('#email').val(),
			
		// };

		let formData = new FormData();
		formData.append('uname',$('#uname').val());
		formData.append('upass',$('#upass').val());
		formData.append('upass2',$('#upass2').val());
		formData.append('email',$('#email').val());
		formData.append('profile',$('#profile')[0].files[0]);

		$.ajax({
			url:'/admin/user/store',
			type:'post',
			data:formData,
			contentType:false,
			processData:false,
			success:function(res){
				
				if(res == 'ok'){
					alert('添加成功');
				}else{
					alert(res);
				}
			}
		});

		
	});
	</script>
</body>
</html>