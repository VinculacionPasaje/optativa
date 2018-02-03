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
            
        <div class="col-md-12 col-lg-12 col-xs-12">

             @if(count($chapter))
                                                    
                @foreach($chapter as $peli)

                    <h4 class="latest-text w3_latest_text"> {{$peli->name}}</h4>
                
                @endforeach
                 @endif

                <div id="tabs" style="height: 400px;">
                            <ul>

                            @if(count($servers_chapters))
                                                                
                                @foreach($servers_chapters as $servers)

                                @foreach($idiomas as $idioma)
                                        @if($idioma->id== $servers->language_id)

                                        <li><a href="#{{$servers->id}}">{{$servers->name}} - {{$idioma->language}}</a></li>
                                        @endif

                                @endforeach



                                @endforeach

                            


                            @endif

                            

                            </ul>

                        @if(count($servers_chapters))
                                                            
                            @foreach($servers_chapters as $servers)
                                <div id="{{$servers->id}}">

                                {!! $servers->embed_code !!}
                                    
                                </div>
                            @endforeach
                        @endif
                    
             </div>

        
        
        
        
        </div>
    </div>
</div>
@endsection