<!-- Carousel -->
<!-- <div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="{{asset('Frontend/images/slide/9186963780455400.jpg')}}">
			<div class="carousel-caption">
				<h1 class="display-2"></h1>
				<h3></h3>
				<button type="button" class="btn btn-outline-light btn-lg">
				</button>
				<button type="button" class="btn btn-primary btn-lg"></button>
			</div>
		</div>
		<div class="carousel-item">
			<img src="{{asset('Frontend/images/slide/219007695964179.jpg')}}">
		</div>
		<div class="carousel-item">
			<img src="{{asset('Frontend/images/slide/3134083556545120.jpg')}}">
		</div>
	</div>
</div>

 -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php $data = DB::table('sliders')->get();?>
    <?php $countChunk = 0;?>
     @foreach($data as $item)
     <?php $countChunk++;?>
    <div class="carousel-item <?php if ($countChunk == 1) {echo ' active';}?>">

      <img src="{{url('uploads/sliders/',$item->image)}}" class="d-block w-100" alt="...">

    </div>
	@endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
