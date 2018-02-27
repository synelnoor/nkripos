<html>
<head>
    <title>FISIP Prof.Dr.Moestopo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<style>
    .navbar-inverse .navbar-nav>li>a {
    color: #fff;
    background-color: #ff8604;
}
</style>
    @yield('styles')    

</head>
<body>
    
            
    @include('includes.navbar')
         

   

    <div class="container-fluid" style=" margin-bottom: 20px; margin-top: 10px;">
        <div class="row">
            
            
                @yield('content')
            
        </div>
    </div>



  @include('includes.prafooter')

  <div id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; FISIP UNIVERSITAS PROF.DR.MOESTOPO(BERAGAMA) </p>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
   var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("item");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
    </script>

<!-- 
  <script type="text/javascript">
    $(function(){
    $('.navbar').affix({
      offset: {
        /* Affix the navbar after scroll below header */
        top: $("header").outerHeight(true)}
    });
});
  </script>
      -->


  @yield('scripts')
         
</body>
</html>

