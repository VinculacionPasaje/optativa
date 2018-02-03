@extends('layouts.admin_user')
@section('title')
    <section class="content-header">
        <h1>
            Subscripciones
            <small>Inicio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Inicio</li>
        </ol>
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    <div class="row">
        <div class="col-xs-12">

              @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
            <div class="box">

            @if(count($subscription))

            
                                                    
                @foreach($subscription as $peli)

                @if($peli->state==1)

                    <div align="center">

                    <h1 style="color:#059604;">Usted posee una subscripción Premium Activa </h1>
                    <p style="font-size: 25px;"> Dias restantes: {{$diff->days . ' dias '}}</p>

                    <a href="{{url ('/')}}" class="btn btn-primary" role="button">Ir a la sección de películas y series</a>

                          
                
                    </div>

                      

                
                
                @else

                    <div align="center">

                        <h1 style="color: #f10000;">Usted posee una subscripción Premium Inactiva </h1>

                         <p style="font-size: 25px;"> Dias restantes: 0 dias</p>

                         <p style="font-size: 25px; color: #059604;">Renovar la subscripción por tan solo $1</p>

                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                      
                        
                       
                                <button type="submit" class="btn btn-primary">
                                    Renovar Ahora
                                </button>
                          
                    </form>

                    
                    </div>

                      

                @endif




                @endforeach
            @else

             <div align="center">

                  <h1 style="color: #f10000;">Usted no posee una subscripción Premium </h1>
                   <p style="font-size: 25px; color: #059604;">Adquiera una subscripción premium por tan solo $1</p>

                   <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                      
                        
                       
                                <button type="submit" class="btn btn-primary">
                                    Adquirir Ahora
                                </button>
                          
                    </form>
            </div>




            
            @endif
        
        <!--
                <div class="panel-heading">Paywith Paypal</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
              
           
             -->

              </div>
        </div>
    </div>


@endsection
