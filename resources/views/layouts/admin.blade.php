<!doctype html>
<html lang="en">
  <head>
  	<title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch sidebar">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
          <h1><a href="index.html" class="logo">Admin</a></h1>
    <ul class="list-unstyled components mb-5">
      <li class="active">
        <a href="{{route('home')}} "><span class="fa fa-home mr-3"></span> Homepage</a>
      </li>
      <li>
          <a href="/admin"><span class="fa fa-user mr-3"></span> Dashboard</a>
      </li>
      <li>
        <a href="{{route('users.index')}} "><span class="fa fa-sticky-note mr-3"></span> Users</a>
      </li>
      <li>
        <a href="{{route('users.create')}}"><span class="fa fa-sticky-note mr-3"></span> create user</a>
      </li>
      
      <li>
        <a href="{{route('posts.index')}} "><span class="fa fa-paper-plane mr-3"></span> Posts</a>
      </li>
      <li>
        <a href="{{route('posts.create')}} "><span class="fa fa-paper-plane mr-3"></span> Create post </a>
      </li>
      <li>
        <a href=" {{route('categories.index')}} "><span class="fa fa-paper-plane mr-3"></span> Categories</a>
      </li>
    </ul>

    </nav>
    <div id="content" class="p-4 p-md-5 pt-5">
          <div id="page-wrapper">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header"></h1>

                          @yield('content')
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>
                  <!-- /.row -->
              </div>
        </div>
    </div>
    <!-- Page Content  -->
    @yield('footer')        

    </div>


<!-- jQuery -->
{{-- <script src="{{asset('js/app.js')}}"></script> --}}

    

  
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

  </body>
</html>
