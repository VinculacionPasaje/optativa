<!doctype html>
<html class="home no-js" lang="">

<head>
  <!-- for-mobile-apps -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="One Movies Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
  		function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- /meta -->
  @yield('title')
<title>CINEMA | BIENVENIDO</title>

<!-- //for-mobile-apps -->
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/style.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/contactstyle.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/faqstyle.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/single.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/medile.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/jquery.slidey.min.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/popuo-box.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/font-awesome.min.css')}}">
<link rel="stylesheet" media="all" type="text/css"  href="{{url('frontend/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/mensajes.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/sweetalert.css')}}">
<link rel="stylesheet" href="{{url('frontend/css/alertify.css')}}">
<link rel="shortcut icon" href="{{url('frontend/images/ico/ico.ico')}}">
<!-- flexSlider -->
<link rel="stylesheet" media="screen" type="text/css"  property="" href="{{url('frontend/css/flexslider.css')}}">


<script src="{{url('frontend/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{url('frontend/js/owl.carousel.js')}}"></script>
<script src="{{url('frontend/js/move-top.js')}}"></script>
<script src="{{url('frontend/js/easing.js')}}"></script>
<script src="{{url('frontend/js/jquery.slidey.js')}}"></script>
<script src="{{url('frontend/js/jquery.dotdotdot.min.js')}}"></script>

<script src="{{url('frontend/js/jquery.magnific-popup.js')}}"></script>




 <script type="text/javascript">
  $("#slidey").slidey({
    interval: 8000,
    listCount: 5,
    autoplay: false,
    showList: true
  });
  $(".slidey-list-description").dotdotdot();
</script>


<script>
 $(document).ready(function() {
   $("#owl-demo").owlCarousel({

     autoPlay: 3000, //Set AutoPlay to 3 seconds

     items : 5,
     itemsDesktop : [640,4],
     itemsDesktopSmall : [414,3]

   });

 });
</script>
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->

<script type="text/javascript">
 jQuery(document).ready(function($) {
   $(".scroll").click(function(event){
     event.preventDefault();
     $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
   });
 });
</script>
<script defer src="{{url('frontend/js/jquery.flexslider.js')}}"></script>


  <script type="text/javascript">
  $(window).load(function(){
    $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
  });
  </script>

  <script>
		$('.toggle').click(function(){
		  // Switches the Icon
		  $(this).children('i').toggleClass('fa-pencil');
		  // Switches the forms
		  $('.form').animate({
			height: "toggle",
			'padding-top': 'toggle',
			'padding-bottom': 'toggle',
			opacity: "toggle"
		  }, "slow");
		});
	</script>





   @yield('head')
</head>


<body>

  <!-- header -->
  	<div class="header">
  		<div class="container">
  			<div class="w3layouts_logo">
  				<a href="{{url ('/')}}"><h1>CINEMA<span>TV</span></h1></a>
  			</div>

  			
  			<div class="clearfix"> </div>
  		</div>
  	</div>
  <!-- //header -->

   @yield('header')

   <!-- nav -->
   	<div class="movies_nav">
   		<div class="container">
   			<nav class="navbar navbar-default">
   				<div class="navbar-header navbar-left">
   					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
   						<span class="sr-only">Toggle navigation</span>
   						<span class="icon-bar"></span>
   						<span class="icon-bar"></span>
   						<span class="icon-bar"></span>
   					</button>
   				</div>
   				<!-- Collect the nav links, forms, and other content for toggling -->
   				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
   					<nav>
   						<ul class="nav navbar-nav">
   							<li class="active"><a href="{{url ('/')}}">Home</a></li>
   							<li class="dropdown">
   								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
   								<ul class="dropdown-menu multi-column columns-3">
   									<li>
   									<div class="col-sm-4">
   										<ul class="multi-column-dropdown">
   											<li><a href="genres.html">Action</a></li>
   											<li><a href="genres.html">Biography</a></li>
   											<li><a href="genres.html">Crime</a></li>
   											<li><a href="genres.html">Family</a></li>
   											<li><a href="horror.html">Horror</a></li>
   											<li><a href="genres.html">Romance</a></li>
   											<li><a href="genres.html">Sports</a></li>
   											<li><a href="genres.html">War</a></li>
   										</ul>
   									</div>
   									<div class="col-sm-4">
   										<ul class="multi-column-dropdown">
   											<li><a href="genres.html">Adventure</a></li>
   											<li><a href="comedy.html">Comedy</a></li>
   											<li><a href="genres.html">Documentary</a></li>
   											<li><a href="genres.html">Fantasy</a></li>
   											<li><a href="genres.html">Thriller</a></li>
   										</ul>
   									</div>
   									<div class="col-sm-4">
   										<ul class="multi-column-dropdown">
   											<li><a href="genres.html">Animation</a></li>
   											<li><a href="genres.html">Costume</a></li>
   											<li><a href="genres.html">Drama</a></li>
   											<li><a href="genres.html">History</a></li>
   											<li><a href="genres.html">Musical</a></li>
   											<li><a href="genres.html">Psychological</a></li>
   										</ul>
   									</div>
   									<div class="clearfix"></div>
   									</li>
   								</ul>
   							</li>
   							<li><a href="series.html">tv - series</a></li>
   							<li><a href="news.html">news</a></li>
   							<li class="dropdown">
   								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
   								<ul class="dropdown-menu multi-column columns-3">
   									<li>
   										<div class="col-sm-4">
   											<ul class="multi-column-dropdown">
   												<li><a href="genres.html">Asia</a></li>
   												<li><a href="genres.html">France</a></li>
   												<li><a href="genres.html">Taiwan</a></li>
   												<li><a href="genres.html">United States</a></li>
   											</ul>
   										</div>
   										<div class="col-sm-4">
   											<ul class="multi-column-dropdown">
   												<li><a href="genres.html">China</a></li>
   												<li><a href="genres.html">HongCong</a></li>
   												<li><a href="genres.html">Japan</a></li>
   												<li><a href="genres.html">Thailand</a></li>
   											</ul>
   										</div>
   										<div class="col-sm-4">
   											<ul class="multi-column-dropdown">
   												<li><a href="genres.html">Euro</a></li>
   												<li><a href="genres.html">India</a></li>
   												<li><a href="genres.html">Korea</a></li>
   												<li><a href="genres.html">United Kingdom</a></li>
   											</ul>
   										</div>
   										<div class="clearfix"></div>
   									</li>
   								</ul>
   							</li>
   							@if (Route::has('login'))
								
									@if (Auth::check())
										<li><a href="{{ url('administracion') }}">Mi Perfil</a></li>
									@else
									    <li><a href="{{ url('/login') }}">Login</a></li>
										

										<li><a href="{{ url('/register') }}">Register</a></li>
									@endif
								
							@endif
   						</ul>
   					</nav>
   				</div>
   			</nav>
   		</div>
   	</div>
   <!-- //nav -->


<div class="container" style="padding-bottom: 50px; padding-top: 50px;">



             @yield('contenido')

</div>





<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Subscribe to us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Your email..." required="">
								<input type="submit" value="Send">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="index.html"><h2>One<span>Movies</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2016 One Movies. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="genres.html">Movies</a>
					</li>
					<li>
						<a href="faq.html">FAQ</a>
					</li>
					<li>
						<a href="horror.html">Action</a>
					</li>
					<li>
						<a href="genres.html">Adventure</a>
					</li>
					<li>
						<a href="comedy.html">Comedy</a>
					</li>
					<li>
						<a href="icons.html">Icons</a>
					</li>
					<li>
						<a href="contact.html">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>





 <!-- Bootstrap Core JavaScript -->
 <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>

 <script>
 $(document).ready(function(){
     $(".dropdown").hover(
         function() {
             $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
             $(this).toggleClass('open');
         },
         function() {
             $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
             $(this).toggleClass('open');
         }
     );
 });
 </script>
 <!-- //Bootstrap Core JavaScript -->
 <!-- here stars scrolling icon -->
   <script type="text/javascript">
     $(document).ready(function() {
       /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
       */

       $().UItoTop({ easingType: 'easeOutQuart' });

       });
   </script>
 <!-- //here ends scrolling icon -->




   @yield('script')




</body>

</html>
