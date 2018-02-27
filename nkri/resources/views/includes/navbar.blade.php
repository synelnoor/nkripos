@section('styles')
  <style>
    .navbar.navbar-inverse{background-color:rgb(179, 89, 0); color: #fff; }
    /* Add the below transitions to allow a smooth color change similar to lyft */
    .navbar {
        -webkit-transition: all 0.6s ease-out;
        -moz-transition: all 0.6s ease-out;
        -o-transition: all 0.6s ease-out;
        -ms-transition: all 0.6s ease-out;
        transition: all 0.6s ease-out;

    }

    .navbar.scrolled {
      background: rgb(68, 68, 68); /* IE */
      background: rgba(0, 0, 0, 0.78); /* NON-IE */
    }
  </style>
@endsection

<div class="container-fluid " style="background-color:#fff;color:#000;height:100px;">
        <a class="navbar-brand centered" href="{{ url('/') }}"><img src="{{ asset('/img/head.gif')}}" style="max-width:100%; margin-top: 0px; height: 70px; align:center; ">
        </a>
        
</div>


<nav class="navbar navbar-inverse" style="background-color:rgb(179, 89, 0)">
  <div class="container-fluid" style="background-color:rgb(179, 89, 0)">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <!--  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/img/logo.png')}}" style="max-width:100px; margin-top: -9px; height: 40px;">
      </a>
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('/img/textt.png')}}" style="max-width:100%; margin-top: -13px; height: 47px;">
      </a> -->
       
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="{{ url('/') }}">BERANDA <span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PROFIL<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('/sambutan')}}">Sambutan</a></li>
            <li><a href="{{url('/visimisi')}}">Visi dan Misi</a></li>
            <li><a href="{{url('/organisasi')}}">Organisasi</a></li>
            <li><a href="{{url('/pimpinan')}}">Pimpinan</a></li>
            <li><a href="#">SDM</a></li>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUK<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('/adminegara')}}">Administrasi Negara</a></li>
            <li><a href="{{url('/hubinter')}}">Hub Internasional</a></li>
          </ul>
        </li>


         
        <li><a href="{{url('/kontak')}}">KONTAK</a></li>

      </ul><!-- closenavleft -->
     
      <ul class="nav navbar-nav navbar-right">
<!--
       <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Cari...">
        </div>
        <button type="submit" class="btn btn-default">Cari</button>
      </form>

      -->
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@section('scripts')

@endsection