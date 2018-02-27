<div id="carousel-example-generic" class="carousel" data-ride="carousel"  style="margin-top: 0; margin-bottom: 0px margin-left:-15px; margin-right: -15px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="dot"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1" class="dot"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"
    class="dot"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

  @foreach($data as $item)               
    
   
    <div class="item fade">
      <img src="{{ url('upimg') }}/{{ $item->img }}" style="width: 100%; height: 500px;" >
      <div class="carousel-caption">
        ...
      </div>
    </div>
     @endforeach


  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
   <div class="row">
      <div class="artikel">
        

  @foreach($data as $item)               
    <div class="col-lg-4" style="margin-left: auto; margin-right: auto;">
         <img src="{{ url('upimg') }}/{{ $item->img }}" class="img-circle" alt="Generic placeholder image" style="width: 140px; height: 140px;">
        <h2 class="judul">{{$item->judul}}</h2>
        <p> {!! str_limit($item->isi,$limit = 250, $end="...")!!}</p>
        
        <p><a href="{{url('/artikeldetail/'.$item->id)}}" class="btn btn btn-warning btn-xs">Selengkapnya >></a></p>
      </div>
   @endforeach
        </div>
      </div>
  </div>

  <div class="container-fluid" style="background-color:  #ff8604;">
    <div class="row" >
    <div class="container">
      <div class="col-md-3">
        
           <a href="http://pmb.moestopo.ac.id/"><img src="{{asset('/img/banner.jpg')}}" style="height: 300px;"></a>
         
      </div>
      <div class="col-md-8">
         
           <a class="twitter-timeline" data-width="100%" data-height="300" href="https://twitter.com/fisip_moestopo">Tweets by fisip_moestopo</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      </div>
    </div>
  </div>