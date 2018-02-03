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

<link rel="stylesheet" href="{{url('frontend/css/jquery-ui.css')}}">




<!-- flexSlider -->
<link rel="stylesheet" media="screen" type="text/css"  property="" href="{{url('frontend/css/flexslider.css')}}">

 <!-- //here ends scrolling icon -->
 <script src="{{url('frontend/js/jquery-latest.js')}}"></script>
<script src="{{url('frontend/js/jquery-2.1.4.min.js')}}"></script>


  <script src="{{url('frontend/js/jquery-ui.js')}}"></script>
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
   	<div class="movies_nav menu">
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
   							<li class="active"><a href="{{url ('/')}}">INICIO</a></li>
   							 @yield('categoria')
							<li><a href="{{ url('series') }}">SERIES TV</a></li>
							<li><a href="{{ url('peliculas') }}">PELICULAS</a></li>
   						@if (Route::has('login'))
								
									@if (Auth::check())

									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">PERFIL <b class="caret"></b></a>
										<ul class="dropdown-menu multi-column2 columns-3">
											<li>
												<div>
													<ul class="multi-column-dropdown">
														<li><a href="{{ url('user/perfil') }}">Mi Perfil</a></li>
														<li><a href="{{ route('logout') }}"
															onclick="event.preventDefault();
																		document.getElementById('logout-form').submit();"
																		class="btn btn-default btn-flat"><i class="fa fa-power-off"></i>
															Salir
														</a></li>


                      
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
														</form>
														
													</ul>
												</div>
												
												<div class="clearfix"></div>
											</li>
										</ul>
									</li>


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
				
				<div class="col-md-12" align="center">
					<a href="{{ url('/')}}"><h2>CINEMA<span> TV</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
					<p>&copy; 2018 CINEMA TV. All rights reserved | Design by <a href="#">CGM</a></p>
			</div>
			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="{{ url('peliculas') }}">Peliculas</a>
					</li>
					<li>
						<a href="{{ url('series') }}">Series</a>
					</li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->





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

 <script>
		$(document).ready(function(){
			var altura = $('.menu').offset().top;
			
			$(window).on('scroll', function(){
				if ( $(window).scrollTop() > altura ){
					$('.menu').addClass('menu-fixed');
				} else {
					$('.menu').removeClass('menu-fixed');
				}
			});

		});

</script>

<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>




   @yield('script')




</body>

</html>
