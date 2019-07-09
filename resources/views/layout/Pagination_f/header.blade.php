
<header id="header"><!-- header -->
	<div class="header_top"><!-- header_top -->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> 0362188088</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> tronghungbo@gmail.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav" id="dcmm">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-youtube"></i></a></li>
							<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
							<!--  @if(Auth::check())
							                                <li class="userAc"><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i>{{Auth::user()->email}}</a></li>
							                                <li  class="userAc"><a href="{{ url('/logoutUser') }}"><i class="fa fa-lock"></i> Logout </a>
							                                </li>
							                            @else
							                                <li  class="userAc"><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
							                            @endif -->
							                            <div class="dropdown" style="color: #696763;">
							                            	@if(Auth::check())
							                            	<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							                            		<a href="" style="color: #696763;  font-size: 16px;"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
							                            	</button>

							                            	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color:#F0F0E9; ">
							                            		<li><a href="{{url('/myaccount')}}" style="color: #696763;"><i class="fa fa-user"></i>Password</a></li>
							                            		<li><a href="{{ url('/logoutUser') }}" style="color: #696763;"><i class="fa fa-lock"></i> Logout </a></li>

							                            	</div>
							                            	@else
							                            	 <li  class="userAc"><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Login</a></li>
							                            	 @endif
							                            </div>

						</ul>
					</div>

				</div>
			</div>
		</div>
	</div><!-- header_top -->
<div class="header_bottom">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		<a class="navbar-branch" href="{{url('/')}}">
			<img src="{{asset('Frontend/images/logoend.png')}}" height="50">
		</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">
    	<?php $categories = DB::table('categories')->where([['status', 1], ['parent_id', 0]])->get();
?>

	 @foreach($categories as $category)
					   <?php
$sub_categories = DB::table('categories')->select('id', 'name')->where([['parent_id', $category->id], ['status', 1]])->get();
?>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('cats',$category->name)}}" id="navbarDropdown">{{$category->name}}</a>
         @if(count($sub_categories)>0)
        <div class="dropdown-content" aria-labelledby="navbarDropdown">
          @foreach($sub_categories as $sub_category)
							<a class="dropdown-item" href="{{route('cats',$sub_category->name)}}">{{$sub_category->name}}</a>
							@endforeach
        </div>
        @endif
      </li>
     @endforeach
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{url('search')}}" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchData">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    	@if(Auth::check())

    <div class="beta-select " id="cart"><a href="{{route('viewCart')}}"><i class="fas fa-shopping-cart"></i>(@if(Cart :: session ( auth()->user()->id)->getTotalQuantity()>=0){{Cart :: session(auth()->user()->id)->getTotalQuantity()}} @else 0 @endif)</a></div>
    	@endif
  </div>
  </div>
</nav>
</div>

</header><!--header-->