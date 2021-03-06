@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Inicio
            <small>Listar</small>
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuarios Registrados</h3>

                
                </div>
                <!-- /.box-header -->
                 @if(count($usuarios) >0)

                  

                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                              
                                    <tr data-id="{{$usuario->id}}">
                                        @if($usuario->path!=null)
                                            <td>
                                                <img src="{{url('fotos/'.$usuario->path)}}" alt="" style="width:50px;"/>
                                            </td>
                                        @else
                                            <td>
                                                <img src="{{url('fotos/no-avatar.png')}}" alt="" style="width:50px;"/>
                                            </td>
                                        @endif
                                       
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->last_name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        
                                        <td>
                                           
                                            {!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>


                                    
                                        </td>

                                    </tr>
                                  
                                @endforeach
                            </tbody>
                            </table>
                            {{$usuarios->links()}}
                        </div>
                    </div>

                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun Usuario...</label>  </div>
                @endif
              
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['usuarios.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/js/usuarios/delete-usuarios.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection