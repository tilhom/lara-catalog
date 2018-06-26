<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin - Mycatalog</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{asset('css/titatoggle-dist-min.css')}}" rel="stylesheet">
  <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  @include('admin.partials.page-nav')
  <div class="content-wrapper">
    <div class="container-fluid">
     @yield('content')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('admin.partials.page-footer')
    @include('admin.partials.page-modal')
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script>$(document).ready(function() {
    $('.FormControlSelect1').select2();
});
</script>
    @yield('jscode')

</script>
  </div>
</body>

</html>
