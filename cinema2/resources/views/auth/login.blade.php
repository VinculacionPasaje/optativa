@extends('layouts.base')

@section('contenido')
<div class="container">
    <div class="row">
            
        <div class="col-md-8">
          @if (session('mensaje-registro'))
              @include('mensajes.msj_correcto')
          @endif

         

            
          
            <div class="panel panel-default">

                <div class="modal-header">BIENVENIDO A CINEMA TV</div>

                <div class="panel-body">


                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar contraseña
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                              <div align="center">
                                <button type="submit" class="btn-login">
                                    INGRESAR
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste la contraseña?
                                </a>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-4">
                

            <div style="text-align:center; padding-bottom:25px;">

                        <h2> ¿No tienes una cuenta? </h2>
                        

            </div>

             <div align="center">
                                <a href="{{ url('/register') }}" style="color:inherit">
                                
                                 <button type="button" class="btn-login">
                                    REGISTRARME 
                                </button>

                                </a>

            </div>


             <div style="text-align:center; padding-bottom:25px; padding-top:25px;">

                        <h2> ¿Tienes problemas? </h2>
                        

            </div>

             <div align="center">
                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                   ¿ Olvidaste la contraseña?
                                </a>

            </div>



                
        </div>
    </div>
</div>
@endsection
