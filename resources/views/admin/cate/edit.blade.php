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
				<h1 class="text-center text-info">修改分类</h1>
				<form id="form1" action="/admin/cate/update/{{$data->id}}" method="post" enctype="multipart/form-data" >
				  {{csrf_field()}}
				  <input type="hidden" id="path" name="path" value="{{$data->path}}">
				  <div class="form-group">
				    <label for="cname" >分类名称</label>
				    <input type="text" class="form-control" id="cname" name="cname" placeholder="" value="{{$data->cname}}">
				  </div>
				  <div class="form-group">
				    <label for="pid">上级分类</label>
				    <select id="pid" name="pid">
						<option value="0">----无----</option>
						@foreach($cates as $k=>$v)
						<option value="{{$v->id}}" data-path="{{$v->path}}" @if($v->pid > 0) disabled @endif @if($v->id == $data->pid) selected  @endif>{{$v->cname}}</option>
						@endforeach
				    </select>
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
			$('#pid').on('change',function(e){
				$('#path').val($(this).find('option:selected').attr('data-path'));

			});
		</script>
	<!--scrolling js-->
	<!-- <script src="/admin/js/jquery.nicescroll.js"></script> -->
	<!-- <script src="/admin/js/scripts.js"></script> -->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="/admin/js/bootstrap.js"> </script>
</body>
</html>