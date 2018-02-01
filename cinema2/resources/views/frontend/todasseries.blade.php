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
            
        <div class="col-md-12">

        <h4 class="latest-text w3_latest_text">Todas las series</h4>


        @if(Auth::guest())

           <div class="alert alert-danger alert-dismissable">
				<p style="font-size: 20px;"><strong>! Usted no a iniciado sesión ¡</strong> Solamente se le mostrará un número limitado de series, para ver todo el contenido debe iniciar sesión, hágalo dando click aqui -> <a href="{{ url('/login') }}" class="alert-link">Login</a> 
				o creese una cuenta dando click aqui -> <a href="{{ url('/register') }}" class="alert-link">Registrarse</a> </p>
			</div>

            @if(count($series_guest))
                                                    
                @foreach($series_guest as $peli)

                <div class="col-md-2 w3l-movie-gride-agile">
							<a href="{{url ('serie/'.$peli->id)}}" class="hvr-shutter-out-horizontal"><img src="{{url('fotos/'.$peli->path)}}" title="{{$peli->name}}" class="img-responsive" alt=" {{$peli->name}}" />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="{{url ('serie/'.$peli->id)}}">{{$peli->name}}</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>{{$peli->year}}</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>Nuevo</p>
							</div>
				</div>


                @endforeach
             @endif



        @endif


        @if(Auth::check())

           	<div class="alert alert-success alert-dismissable">
				<p style="font-size: 20px;"><strong>! No se está mostrando todas las series ¡</strong> Accesa a la cuenta premium para disfrutar de todo el contenido aqui -> <a href="#" class="alert-link">Actualizar a cuenta Premium</a> </p>
			</div>


            @if(count($series_register))
                                                    
                @foreach($series_register as $peli)

                <div class="col-md-2 w3l-movie-gride-agile">
							<a href="{{url ('serie/'.$peli->id)}}" class="hvr-shutter-out-horizontal"><img src="{{url('fotos/'.$peli->path)}}" title="{{$peli->name}}" class="img-responsive" alt=" {{$peli->name}}" />
								<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
							</a>
							<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
									<h6><a href="{{url ('serie/'.$peli->id)}}">{{$peli->name}}</a></h6>							
								</div>
								<div class="mid-2 agile_mid_2_home">
									<p>{{$peli->year}}</p>
									<div class="block-stars">
										<ul class="w3l-ratings">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="ribben">
								<p>Nuevo</p>
							</div>
				</div>


                @endforeach
             @endif



        @endif







          

        


        </div>


       

    </div>
</div>
@endsection