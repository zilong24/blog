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
		<div id="page-wrapper">
			<div class="main-page">
				<h1 class="text-center text-info">修改轮播图</h1>
				<form id="form1" action="/admin/banner/update/{{$data->id}}" method="post" enctype="multipart/form-data" >
				  {{csrf_field()}}
				  <div class="form-group">
				    <label for="title" >标题</label>
				    <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{$data->title}}">
				  </div>
				  <div class="form-group">
				    <label for="desc">描述</label>
				    <textarea id="desc" name="desc">{{$data->desc}}</textarea>
				  </div>
				  
				  <div class="form-group">
				    <label for="profile">图片</label>
				    <img style="width: 200px;" src="/uploads/{{$data->profile}}">
				    <input type="file" id="profile" name="profile" class="form-control">
				    
				  </div>

				  <div class="form-group">
				    <label for="url" >链接</label>
				    <input type="text" class="form-control" id="url" name="url" placeholder="" value="{{old('url')}}">
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
			
		</script>
	<!--scrolling js-->
	<!-- <script src="/admin/js/jquery.nicescroll.js"></script> -->
	<!-- <script src="/admin/js/scripts.js"></script> -->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="/admin/js/bootstrap.js"> </script>
</body>
</html>