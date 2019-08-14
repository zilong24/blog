<!DOCTYPE HTML>
<html>
<head>
<title>Tables</title>
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
		<div id="page-wrapper">
			<div class="main-page">
				<h1 class="text-center text-info">添加文章</h1>
				<form id="form1" action="/admin/article/store" method="post" enctype="multipart/form-data" >
				  {{csrf_field()}}
				  <input type="hidden" name="tid">
				  <div class="form-group">
				    <label for="title" >标题</label>
				    <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{old('title')}}">
				  </div>
				  <div class="form-group">
				    <label for="auth">作者</label>
				    <input type="text" class="form-control" id="auth" name="auth" placeholder="" value="{{old('auth')}}">
				  </div>
				  <div class="form-group">
				    <label for="desc">描述</label>
				    <input type="text" class="form-control" id="desc" name="desc" placeholder="" value="{{old('desc')}}">
				  </div>
				  <div class="form-group">
				    <label for="tid" >文章标签</label>

			    	@foreach($tagnames as $k=>$v)
					<button type="button" class="btn tid" value="{{$v->id}}" style="color:white;font-weight: bold;">{{$v->tagname}}</button>

					@endforeach
				    
				  </div>

				<div class="form-group">
					<label for="cid" >文章分类</label>
					<select id="cid" name="cid">
						<option>--请选择--</option>
						@foreach($cates as $k=>$v)
						<option value="{{$v->id}}" @if($v->pid == 0) disabled @endif >{{$v->cname}}</option>
						@endforeach
					</select>
				</div>

				  <div class="form-group">
				    <label for="thumb">缩略图</label>
				    <input type="file" id="thumb" name="thumb" class="form-control">
				    
				  </div>

				  <div class="form-group">
				    <label for="content">内容</label>
				    <!-- 加载编辑器的容器 -->
				    <script id="content" name="content" type="text/plain">
				    
				    </script>
				    
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
			$('.main-page').on('click','.tid',function(){
				$(this).addClass('btn-success').siblings('.tid').removeClass('btn-success');

				$('input[name=tid]').val( $(this).val() );
			});
		</script>
	<!--scrolling js-->
	<!-- <script src="/admin/js/jquery.nicescroll.js"></script> -->
	<!-- <script src="/admin/js/scripts.js"></script> -->
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="/admin/js/bootstrap.js"> </script>

	<!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content',{
      //   	toolbars: [
		    //     ['fullscreen', 'source', 'undo', 'redo', 'bold']
		    // ]
        });
    </script>
</body>
</html>