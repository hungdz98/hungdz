<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shoes store- @yield('title')</title>
	<link rel="stylesheet" href="{{asset('Frontend/css/bootstrap.min.css')}}">
	 <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('Frontend/css/reponsive.css')}}">
	<link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}">
	<link rel="stylesheet" href="{{ asset('Backend/css/select2.css') }}" />
	<link rel="stylesheet" href="{{ asset('Frontend/css/owl.carousel.css') }}" />
	<link rel="stylesheet" href="{{ asset('Frontend/css/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" href="{{asset('Frontend/css/style.css')}}">
</head>
<body>

	@include ('layout.Pagination_f.header')
	@yield('slider')
	<section>
		@yield('content')
	</section>
	@include ('layout.Pagination_f.footer')

	<!-- include js files -->

<script src="{{asset('Frontend/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="{{asset('Frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Frontend/js/all.js')}}"></script>
<script src="{{asset('Backend/js/select2.min.js')}}"></script>
<script src="{{asset('Frontend/js/owl.carousel.js')}}"></script>

<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>60){
				$(".header_bottom").addClass('fixNav')
			}else{
				$(".header_bottom").removeClass('fixNav')
			}
			if($(this).scrollTop()>200){
				$('.back-to-top').addClass('hien-ra');
			}
			else{
				$('.back-to-top').removeClass('hien-ra');
			}
		})
		$('.back-to-top').click(function(event) {
			$('html,body').animate({scrollTop: 0},500);
		});
	})
	</script>
	<script src="{{asset('easyzoom/dist/easyzoom.js')}}"></script>
	<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
</script>

<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>

<script>
	$("#idSize").change(function () {
		var SizeAttr=$(this).val();
		if(SizeAttr!=""){
            $.ajax({
                type:'get',
                url:'/get-product-attr',
                data:{size:SizeAttr},
                success:function(resp){
                	var arr=resp.split("#");
                    // $("#dynamic_price").html('US $'+arr[0]);
                    // $("#dynamicPriceInput").val(arr[0]);
                    if(arr[1]==0){
						$("#buttonAddToCart").hide();
						$("#availableStock").text("Hết hàng ");
                        $("#inputStock").val(0);
					}else{
                        $("#buttonAddToCart").show();
                        $("#availableStock").text("Còn hàng");
                        $("#inputStock").val(arr[1]);
					}
                },error:function () {
                    alert("Error Select Size");
                }
            });
		}
    });
</script>
<!--
<script>
$(document).ready(function(){
  $("#findBtn").click(function(){
    var search = $("#searchID").val();
    var price = $('#priceID').val();
    var size  =$('#sizeID').val();
    var color =$('#colorID').val();
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/productsCat')}}',
      data: 'price=' + price+'&search=' + search + '&size=' + size + '&color=' + color,
      success:function(response){
        console.log(response);
        $("#productData").html(response);
      }
    });


  });

});
</script> -->
<script>
$(document).ready(function(){
  $("#findBtn2").click(function(){
    var search = $("#searchID").val();
    var price = $('#priceID').val();
    var size  =$('#sizeID').val();
    var color =$('#colorID').val();
    var id = $('#id').val();
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/listByCatFind')}}',
      data: 'price=' + price+'&search=' + search + '&size=' + size + '&color=' + color+'&id=' + id,
      success:function(response){
        console.log(response);
        $("#productData").html(response);
      }
    });


  });

});
</script>
<script>
	$(document).ready(function(){
	var $disabledResults = $(".seach2");
	$disabledResults.select2();
	});
</script>
<script>
   var owl = $('.owl-carousel');
owl.owlCarousel({
    loop:true,
    nav:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        960:{
            items:2
        },
        1200:{
            items:3
        }
    }
});

owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
});
</script>
</body>
</html>