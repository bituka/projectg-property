@layout('layouts.master')

@section('content')

<div class="single-prop-view" style="margin-top: 7px; ">


		@foreach($property->images as $image)
		
		    <img class="large-pic" style="height: 265px; width: 670px; margin-left: 46px;" src="{{ asset('uploads/properties/' . $image->name); }}">

		    <?php break; // get only 1 image of the property ?>
		    
		@endforeach

		<div style="height: 110px; /* background: red; */ width: 670px; margin-left: 46px;">

            <div style="margin-left: 40px; padding-top: 7px;"> 
                <ul id="mycarousel" class="jcarousel-skin-tango">
                    @foreach($property->images as $image)             
                        <li><a href="#"><img class="large-pic" width="140" height="95" alt="" src="{{ asset('uploads/properties/' . $image->name); }}"></a></li>
                    @endforeach
                </ul>
            </div>

		
<!-- 
 <ul id="mycarousel" class="jcarousel-skin-tango">
    <li><img src="http://static.flickr.com/66/199481236_dc98b5abb3_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/75/199481072_b4a0d09597_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/57/199481087_33ae73a8de_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/77/199481108_4359e6b971_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/58/199481143_3c148d9dd3_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/72/199481203_ad4cdcf109_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/58/199481218_264ce20da0_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/69/199481255_fdfe885f87_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/60/199480111_87d4cb3e38_s.jpg" width="75" height="75" alt="" /></li>
    <li><img src="http://static.flickr.com/70/229228324_08223b70fa_s.jpg" width="75" height="75" alt="" /></li>
  </ul> -->


		</div>

		<div style="width: 670px; margin: 0 auto; background: red;">

			<div style="float: left; background: black; width: 185px; height: 210px; color: #fbaf01; font-size: 12px;">
				<h4 style="margin-top: 40px;">Date :</h4>
				<p>{{ $property->created_at }}</p>

				<h4 style="margin-top: 15px;">Location :</h4>
				<p>{{ $property->location }}</p>

				<h4 style="margin-top: 15px;">Rooms :</h4>
				<p>{{ $property->rooms }}</p>

				<h4 style="margin-top: 15px;">Price :</h4>
				<p>{{ $property->price }}</p>
			</div>

			<div style="height: 210px; width: 485px; background: white; float: left;">
				<div style="padding: 15px;">
					<h4 style="color: black; font-size: 16px;">PROPERTY DESCRIPTION</h4>
					<h4 style="color: #fbaf01; font-size: 18px; text-transform: uppercase; margin-top: 10px;">{{ $property->title }}</h4>
					<p style="margin-top: 10px; color: #878787; font-size: 12px;">{{ $property->description }}</p>
				</div>
			</div>

			<div style="clear: both;"></div>

		</div>


</div>

<script src="{{ asset('jcarousel/jquery.jcarousel.js') }}" type="text/javascript"></script>
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel();
});

</script>

<link rel="stylesheet" href="{{ asset('jcarousel/style.css') }}" media="all"  type="text/css"/>

@endsection
