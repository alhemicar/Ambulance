<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ambulance</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" type="text/css">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset("bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css">
    <!-- Ionicons -->
    <link rel="stylesheet" href=https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}" type="text/css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset("bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css") }}" type="text/css"/>

    <link rel="stylesheet" href="{{ asset("css/custom.css") }}" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" type="text/css"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="text/css"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">AMB</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Ambulance</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">

                                <p>
                                    {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
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

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">MENU</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{route('medicals.index')}}"><i class="fa fa-ambulance"></i> <span>Medicals</span></a></li>
                @if(Auth::check() && Auth::user()->user_role_id !== 2)
                <li class="treeview">
                    <a href="#"><i class="fa fa-heartbeat"></i> <span>Patients</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('patients.index')}}">Patients</a></li>
                        <li><a href="{{route('places.index')}}">Places</a></li>
                    </ul>
                </li>

                @endif
                @if(Auth::check() && Auth::user()->user_role_id === 1)
                    <li><a href="{{route('doctorTypes.index')}}"><i class="fa fa-stethoscope"></i> <span>Doctor Type</span></a></li>
                    <li class=""><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
                @endif
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Test app Ambulance
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="https://www.linkedin.com/in/minja-kolundzija-36295096?trk=nav_responsive_tab_profile">Minja Kolundzija</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset("bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}" type="text/javascript"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset("bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("bower_components/moment/min/moment.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js") }}" type="text/javascript"></script>

<script src="{{ asset("bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("bower_components/jquery-validation/dist/jquery.validate.min.js") }}" type="text/javascript"></script>

@yield('javascript')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
