<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CinemaTv | Bienvenido</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('administration/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/timepicker/bootstrap-timepicker.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{url('administration/plugins/datatables/dataTables.bootstrap.css')}}">

    <link rel="stylesheet" href="{{url('administration/dist/css/mensajes.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/alertify.css')}}">
    <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background: #ecf0f5 !important;">
<div class="wrapper" id="contenido_principal">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('administracion')}}" class="logo">
            <span class="logo-mini"><b>AD</b></span>
            <span class="logo-lg"><b>ADMINISTRACIÓN</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <small class="bg-red">Online</small>
                            <img src="{{url('fotos/'.Auth::user()->path)}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{!! Auth::user()->name.' '.Auth::user()->last_name !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <img src="{{url('fotos/'.Auth::user()->path)}}" class="img-circle" alt="User Image">

                                <p>
                                    Administrador
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                     <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                                                    class="btn btn-default btn-flat"><i class="fa fa-power-off"></i>
                                           Salir
                                       </a>


                      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                <img src="{{url('fotos/'.Auth::user()->path)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p>{!! Auth::user()->name.' '.Auth::user()->last_name !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="{{url('administracion')}}">
                        <i class="fa fa-laptop"></i>
                        <span>Inicio</span>
                    </a>

                </li>
                

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>
                        <span>USUARIOS</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                           <li><a href="{{route('usuarios.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                     
                          <li><a href="{{route('usuarios.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                    
                    </ul>
                </li>

                 <li class="treeview">
                    <a href="">
                        <i class="fa fa-credit-card"></i>
                        <span>SUBSCRIPCIONES</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                           <li><a href="#"><i class="fa fa-list-ul"></i>Listado</a></li>
                     
                          <li><a href="#"><i class="fa fa-file"></i> Agregar</a></li>
                    
                    </ul>
                </li>


                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-open"></i>
                        <span>CATEGORIAS</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                           <li><a href="http://127.0.0.1:8000/administracion/categoria/listar/"><i class="fa fa-list-ul"></i>Listado</a></li>
                     
                          <li><a href="http://127.0.0.1:8000/administracion/categoria/create/"><i class="fa fa-file"></i> Agregar</a></li>
                    
                    </ul>
                </li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-users"></i>
                        <span>ACTORES</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                           <li><a href="http://127.0.0.1:8000/administracion/actor/listar/"><i class="fa fa-list-ul"></i>Listado</a></li>
                     
                          <li><a href="http://127.0.0.1:8000/administracion/actor/create/"><i class="fa fa-file"></i> Agregar</a></li>
                    
                    </ul>
                </li>

                 <li class="treeview">
                    <a href="">
                        <i class="fa fa-film"></i>
                        <span>PELICULAS</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                           <li><a href="http://127.0.0.1:8000/administracion/movie/listar/"><i class="fa fa-list-ul"></i>Listado</a></li>
                     
                          <li><a href="http://127.0.0.1:8000/administracion/movie/create/"><i class="fa fa-file"></i> Agregar</a></li>
                    
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-television"></i><span>SERIES</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li>
                            <a href="#"><i class="fa fa-folder-open"></i> Series
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="http://localhost:3000/series"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                                <li><a href="http://localhost:3000/series/new"><i class="fa fa-file"></i> Agregar</a></li>
                             
                            </ul>
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i> Temporadas
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="http://localhost:3000/seasons"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                          <li><a href="http://localhost:3000/seasons/new"><i class="fa fa-file"></i> Agregar</a></li>
                                
                             
                            </ul>
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i> Capitulos
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                           <ul class="treeview-menu">

                                <li><a href="http://localhost:3000/chapters"><i class="fa fa-list-ul"></i>Listar</a></li>
                                <li><a href="http://localhost:3000/chapters/new"><i class="fa fa-list-ul"></i>Agregar</a></li>
                       
                       
                                
                             
                            </ul>
                        </li>
                        
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-server"></i><span>SERVIDORES</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li>
                            <a href="#"><i class="fa fa-film"></i> Servidores Peliculas
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="http://127.0.0.1:8000/administracion/servers/server/listar/"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                                <li><a href="http://127.0.0.1:8000/administracion/servers/server/create/"><i class="fa fa-file"></i> Agregar</a></li>
                             
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-television"></i> Servidores Series
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="http://localhost:3000/serverschapters"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                                <li><a href="http://localhost:3000/serverschapters/new"><i class="fa fa-file"></i> Agregar</a></li>
                             
                            </ul>
                        </li>


                         <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i> Idioma
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="http://127.0.0.1:8000/administracion/servers/idioma/listar/"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                          <li><a href="http://127.0.0.1:8000/administracion/servers/idioma/create/"><i class="fa fa-file"></i> Agregar</a></li>
                                
                             
                            </ul>
                        </li>

                        
                    </ul>
                </li>



                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: #ecf0f5 !important;">
    @yield('title')
    <!-- Main content -->
        <section class="content" style="background: #ecf0f5 !important;">
            @yield('contenido')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script src="{{url('administration/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('administration/plugins/moment.min.js')}}"></script>
    <script src="{{url('administration/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('administration/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('administration/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
    <script src="{{url('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('administration/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{url('administration/dist/js/app.min.js')}}"></script>
    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.extensions.js')}}"></script>

    <script src="{{url('administration/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('administration/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>




    @yield('script')
    </div>
</body>
</html>
