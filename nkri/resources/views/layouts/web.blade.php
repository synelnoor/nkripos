<html>
<head>
    <title>NyeruputKopiRasaIndonesia</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/_all-skins.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Date Picker -->
    <link href="{{ asset('vendor/adminlte/plugins/datepicker/datepicker3.css') }}" rel="stylesheet">

    <!-- Tags Input -->
    <link href="{{ asset('vendor/adminlte/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <!-- include Summernote -->
    <link href="{{ asset('vendor/adminlte/plugins/summernote/summernote.css') }}" rel="stylesheet">

    <!-- Date Time Picker -->
    <link href="{{ asset('vendor/adminlte/plugins/datetimepicker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

    <!-- include Fancybox -->
    <link href="{{ asset('vendor/adminlte/plugins/fancybox/jquery.fancybox.min.css') }}" rel="stylesheet">

    <!-- include Fileuploader -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fileuploader/jquery.fileuploader.css') }}">

    <!-- include Multi-select -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/multi-select/css/multi-select.css') }}">


<style>
    .navbar-inverse .navbar-nav>li>a {
    color: #fff;
    background-color: rgb(179, 89, 0);
}
.navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 0;
    border: 1px solid transparent;
}
</style>
    @yield('styles')    

</head>
<body>
    
            
    @include('includes.navbar')
         

   

    <div class="container-fluid" style=" margin-bottom: 0px; margin-top: 0px;">
        <div class="row">
            
            
                @yield('content')
            
        </div>
    </div>



 
  <div id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; NyeruputKopiRasaIndonesia </p>
            </div>
        </div>
    </div>
</div>

   
    <!-- Javascript -->
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('vendor/adminlte/plugins//bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>

    <!-- Date Picker App -->
    <script src="{{ asset('vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

    <!-- Date Time Picker -->
    <script src="{{ asset('vendor/adminlte/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Tags Input -->
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/plugins/select2/select2.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('vendor/adminlte/plugins/summernote/summernote.min.js') }}"></script>

    <!-- Fancybox -->
    <script src="{{ asset('vendor/adminlte/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- Fileuploader -->
    <script src="{{ asset('vendor/adminlte/plugins/fileuploader/jquery.fileuploader.min.js') }}"></script>

    <!-- Multi-select -->
    <script src="{{ asset('vendor/adminlte/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Quicksearch -->
    <script src="{{ asset('vendor/adminlte/plugins/quicksearch/jquery.quicksearch.min.js') }}"></script>

    <!-- Input Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte/dist/js/app.min.js') }}"></script>

   

  @yield('scripts')
         
</body>
</html>

