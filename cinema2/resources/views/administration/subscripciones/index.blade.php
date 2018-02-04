@extends('layouts.admin')
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
                 @if(count($subscripciones))

                  

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
                                    <th>ACCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscripciones as $paymen)
                              
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

                                        <td>
                                           
                                            
                                            <button type="button" class="btn btn-danger btn-sm btn-delete" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Dar de Baja</button>


                                    
                                        </td>
                                        
                                        

                                    </tr>
                                  
                                @endforeach
                            </tbody>
                            </table>

                             {{$subscripciones->links()}}
                            
                        </div>
                    </div>

                @else
                    <div align="center">

                        <h1 style="color: #f10000;">No hay gente subscripta </h1>
                        
                    </div>
                @endif
              
            </div>
            <!-- /.box -->

         

         
        </div>
    </div>

    
    {!! Form::open(['route' => ['subscripciones.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}


@endsection

@section('script')
    <script src="{{url('administration/js/subscripciones/delete.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection