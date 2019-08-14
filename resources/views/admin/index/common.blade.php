
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="/admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/admin/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<!-- <script src="/admin/js/jquery-1.11.1.min.js"></script> -->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script src="/admin/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="/admin/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="/admin/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<!-- <script src="/admin/js/Chart.js"></script> -->
<!-- //chart -->
<!--Calender-->
<!-- <link rel="stylesheet" href="/admin/css/clndr.css" type="text/css" />
<script src="/admin/js/underscore-min.js" type="text/javascript"></script>
<script src= "/admin/js/moment-2.2.1.js" type="text/javascript"></script> -->

<!-- <script src="/admin/js/clndr.js" type="text/javascript"></script> -->
<!-- <script src="/admin/js/site.js" type="text/javascript"></script> -->
<!--End Calender-->

<!-- Metis Menu -->
<script src="/admin/js/metisMenu.min.js"></script>
<script src="/admin/js/custom.js"></script>
<link href="/admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<style type="text/css">
.cbp-spmenu-push div#page-wrapper {
    margin: 0em 0 0 15.3em;
	transition:.5s all;
	-webkit-transition:.5s all;
	-moz-transition:.5s all;
}
.main-page{
	/*max-width: 400px;*/
	min-height: 500px;
}
</style>