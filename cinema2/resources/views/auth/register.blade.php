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
        <div class="col-md-8">
          @if (session('mensaje-registro'))
              @include('mensajes.msj_correcto')
          @endif
          @if(!$errors->isEmpty())
              <div class="alert alert-danger">
                  <p><strong>Error!! </strong>Corrija los siguientes errores</p>
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <div class="panel panel-default">
                <div class="modal-header">REGISTRO</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('path') ? ' has-error' : '' }}">
                        <label for="path" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">


                                        {!!Form::file('path',['class'=>'form-control'])!!}
                                        @if ($errors->has('path'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('path') }}</strong>
                                            </span>
                                        @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn-login">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


         <div class="col-md-4">


          <div style="text-align:center; padding-bottom:25px;">

                        <h2> ¿Ya tienes una cuenta? </h2>
                        

            </div>

             <div align="center">
                                <a href="{{ url('/login') }}" style="color:inherit">
                                
                                 <button type="button" class="btn-login">
                                    IDENTIFICARME 
                                </button>

                                </a>

            </div>

            <div style="text-align:center; padding-bottom:25px; padding-top:25px;">

                        <h2> Registrate ahora para: </h2>
                        

            </div>

             <div align="justify">
                    <ul>
                        <li style="font-size: 20px;"><span>Disfrutar de tus series y películas favoritas.</span></li>
                        <li style="font-size: 20px;"><span>Ver Peliculas y videos sin anuncios.</span></li>
                        <li style="font-size: 20px;"><span>Todo el contenido disponible las 24H.</span></li>
                        <li style="font-size: 20px;"><span>Agregar tus peliculas a favoritos.</span></li>
                        
                    </ul>

            </div>




         </div>
    </div>
</div>
@endsection
