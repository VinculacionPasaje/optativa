@extends('layouts.base')

@section("categoria")

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORIAS <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<li>
									<div class="col-sm-4">
										<ul class="multi-column-dropdown">
									         	@if(count($categorias))
												 
                                                    @foreach($categorias as $cat)

                                                        <li><a href="{{url('categorias/'.$cat->id)}}">{{$cat->categorie}}</a></li>
                                                    


                                                    @endforeach
                                                @endif
										
										</ul>
									</div>
									
									<div class="clearfix"></div>
									</li>
								</ul>
	</li>


@endsection

@section('contenido')
<div class="container">
    <div class="row">
            
        <div class="col-md-8 single-left">

          @if(count($pelicula))
												 
			@foreach($pelicula as $peli)
                    <!-- Latest-tv-series -->
                <div class="Latest-tv-series">
                    <h4 class="latest-text w3_latest_text w3_home_popular"> {{$peli->name}} - Official Trailer</h4>
                    <div class="container">
                        <section class="slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="agile_tv_series_grid">
                                            <div class="col-md-8 agile_tv_series_grid_left">
                                                <div class="w3ls_market_video_grid1">
                                                    <img src="{{url('fotos/'.$peli->cover)}}" alt=" " class="img-responsive" />
                                                    <a class="w3_play_icon" href="#small-dialog">
                                                        <span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8 agile_tv_series_grid_right">
                                                <p class="fexi_header">{{$peli->name}}</p>
                                                <p class="fexi_header_para"><span>Sipnosis<label>:</label></span> {{$peli->description}}</p>
                                                <p class="fexi_header_para"><span>Lanzamiento<label>:</label></span> {{$peli->fecha}} </p>
                                                 <p class="fexi_header_para"><span>Director<label>:</label></span> {{$peli->director}} </p>
                                                  <p class="fexi_header_para"><span>Productora<label>:</label></span> {{$peli->productora}} </p>
                                                <p class="fexi_header_para">
                                                    <span>Categoria<label>:</label> </span>
                                                    @foreach($categoria_pelicula as $cat)
                                                      <a href="#">{{$cat->categorie}}</a> | 
                                                    @endforeach						
                                                </p>
                                                <p class="fexi_header_para fexi_header_para1"><span>Rating<label>:</label></span>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                </p>
                                            </div>
                                            <div class="clearfix"> </div>
                                            
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </section>
                        <!-- flexSlider -->
                           
                    </div>
                </div>


                 <div id="small-dialog" class="mfp-hide">
                    {!! $peli->trailer !!}
                </div>
                
        
        @endforeach

                <link rel="stylesheet" href="{{url('frontend/css/flexslider.css')}}" type="text/css" media="screen" property="" />
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
                        <!-- //flexSlider -->

                        <!-- pop-up-box -->  
                <script src="{{url('frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                <!--//pop-up-box -->
               
                
                <script>
                    $(document).ready(function() {
                    $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });
                                                                                    
                    });
                </script>
            <!-- //Latest-tv-series -->
        @endif

        <h4 class="latest-text w3_latest_text w3_home_popular" style="padding-top: 25px;"> Opciones de Reproducciones</h4>

                    @if(Auth::guest())

                    <div class="alert alert-danger alert-dismissable">
                        <p style="font-size: 20px;"><strong>! Las opciones de reproducción se encuentrán deshabilitadas ¡</strong> para activarlas deberá iniciar sesión, Hágalo dando click aqui -> <a href="{{ url('/login') }}" class="alert-link">Login</a> 
                        o creese una cuenta dando click aqui -> <a href="{{ url('/register') }}" class="alert-link">Registrarse</a> </p>
                    </div>




                    @endif

                    @if(Auth::check())

                    	@if(Auth::check())

                            <div class="alert alert-success alert-dismissable">
                                <p style="font-size: 20px;"><strong>! No se está mostrando todas las películas ¡</strong> Accesa a la cuenta premium para disfrutar de todo el contenido aqui -> <a href="#" class="alert-link">Actualizar a cuenta Premium</a> </p>
                            </div>




                            @endif

                    <div id="tabs">
                            <ul>

                            @if(count($servers_movies))
                                                                
                                @foreach($servers_movies as $servers)

                                @foreach($idiomas as $idioma)
                                        @if($idioma->id== $servers->languages_id)

                                        <li><a href="#{{$servers->id}}">{{$servers->name}} - {{$idioma->language}}</a></li>
                                        @endif

                                @endforeach



                                @endforeach

                            


                            @endif

                            

                            </ul>

                        @if(count($servers_movies))
                                                            
                            @foreach($servers_movies as $servers)
                                <div id="{{$servers->id}}">

                                {!! $servers->embed_code !!}
                                    
                                </div>
                            @endforeach
                        @endif
                    
                    </div>

                    @endif
                


        </div>


        <div class="col-md-4 single-right">
        
					<h3 align="center">Películas Similares</h3>

                     @if(count($peliculas_similares))
												 
			            @foreach($peliculas_similares as $peli_similar)
                            <div class="single-grid-right">
                                <div class="single-right-grids">
                                    <div class="col-md-4 single-right-grid-left">
                                        <a href="{{url ('pelicula/'.$peli_similar->id)}}"><img src="{{url('fotos/'.$peli_similar->path)}}" alt="" /></a>
                                    </div>
                                    <div class="col-md-8 single-right-grid-right">
                                        <a href="{{url ('pelicula/'.$peli_similar->id)}}" class="title"> {{$peli_similar->name}}</a>
                                        <p class="author"><a href="#" class="author">{{$peli_similar->year}}</a></p>
                                        <p class="views">{{$peli_similar->description}}</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                

                            </div>
                        @endforeach
                    @endif
			
				

				
				<div class="clearfix"> </div>
        </div>




    </div>
</div>
@endsection