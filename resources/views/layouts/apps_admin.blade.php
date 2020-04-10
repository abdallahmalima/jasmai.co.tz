<!DOCTYPE html>
<html lang="en" ng-app>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>#</title>

  
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('admin/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('admin/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="{{ asset('admin/app/css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

   

    
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>

</head>

<body>

    <div id="app">



        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" >
            
            <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand " href="#" >
                    <b>Jasmai Web</b>
                </a>
                
            </div>
            <!-- /.navbar-header -->


             <ul class="nav navbar-top-links navbar-right ">
                
               <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
          
          
             

           

            </div>


        </nav>


        <div class="col-lg-3">

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        
                        
                        <li>
                            <a href="{{ route('admins.home')}}">
                            <i class="fa fa-cubes fa-fw"></i> 
                               Logo
                           </a>
                        </li>
                        <li>
                            <a href="{{ route('admins.headers.index')}}"><i class="fa fa-header fa-fw"></i>Header</a>
                        </li>
                        
                       
                        <li>
                            <a href="{{ route('admins.categories.index')}}"><i class="fa fa-sitemap fa-fw"></i>Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('admins.sub-categories.index')}}"><i class="fa fa-sitemap fa-fw"></i>Sub-Categories</a>
                        </li>

                        <li>
                            <a href="{{ route('admins.works.index')}}"><i class="fa fa-building fa-fw"></i>Works</a>
                        </li>
                        <li>
                            <a href="{{ route('admins.clients.index')}}"><i class="fa fa-hand-rock-o fa-fw"></i>Clients</a>
                        </li>

                        

                        <li>
                            <a href="{{ route('admins.gallaries.index')}}"><i class="fa fa-picture-o fa-fw"></i>Gallary</a>
                        </li>
                        <li>
                            <a href="{{ route('admins.contact.create')}}"><i class="fa fa-users fa-fw"></i>Contacts</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bars fa-fw"></i>Footer item 1<span class="fa arrow"></span>
                            </a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bars fa-fw"></i>Footer item 2<span class="fa arrow"></span>
                            </a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bars fa-fw"></i>Footer item 3<span class="fa arrow"></span>
                            </a>
                        </li>
                        
                     


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            
        </div>

        @yield('content')

    <!-- jQuery -->
  

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <!--<script src=" {{ asset('admin/vendor/metisMenu/metisMenu.min.js') }}"></script> -->
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.5/metisMenu.js"></script>
    
    

    <!-- DataTables JavaScript -->
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    

    
 

</body>

</html>
