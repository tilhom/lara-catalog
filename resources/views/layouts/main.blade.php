<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
  </head>
  <body>
    <!-- Navigation -->
    @include('layouts.partials.navbar')
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          @include('layouts.partials.sidebar')
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          @yield('content')
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <!-- Footer -->
    @include('layouts.partials.footer')
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>