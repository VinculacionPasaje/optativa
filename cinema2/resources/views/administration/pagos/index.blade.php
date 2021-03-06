@extends('layouts.admin_user')
@section('title')
    <section class="content-header">
        <h1>
            PAGOS
           
        </h1>
        
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    <div class="row">
        <div class="col-xs-12">

        <div class="box">
                <div class="box-header">
                    <h3 class="box-title">PAGOS REALIZADOS</h3>

                
                </div>
                <!-- /.box-header -->
                 @if(count($subscription))

                  

                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FECHA INICIO</th>
                                    <th>FECHA FIN</th>
                                    <th>PAGO</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pagos as $paymen)
                              
                                    <tr data-id="{{$paymen->id}}">
                                        <td>{{$paymen->id}}</td>
                                        <td>

                                        <?PHP  echo date('Y-m-d',strtotime($paymen->date_start)); ?>
                                        
                                         </td>
                                      
                                       
                                        <td> <?PHP  echo date('Y-m-d',strtotime($paymen->date_end)); ?></td>
                                        <td>{{$paymen->payment}} $</td>
                                        <td>

                                        <?PHP  $fecha_actual=date("Y-m-d"); 

                                                $fecha_final= date('Y-m-d',strtotime($paymen->date_end));
                                        
                                        ?>

                                        @if($fecha_actual <$fecha_final)

                                        <p style="color: #059604; font-weight: bold;">Activo </p>

                                       


                                        @else

                                         <p style="color: #f10000;font-weight: bold;">Caducado </p>

                                        @endif
                                        
                                        
                                        
                                        </td>
                                        
                                        

                                    </tr>
                                  
                                @endforeach
                            </tbody>
                            </table>
                            
                        </div>
                    </div>

                @else
                    <div align="center">

                        <h1 style="color: #f10000;">Usted no posee una subscripción Premium </h1>
                        
                    </div>
                @endif
              
            </div>
            <!-- /.box -->

         

         
        </div>
    </div>


@endsection
