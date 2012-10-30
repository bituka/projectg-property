@layout('layouts.master')

@section('content')
<div class="find_prop">
<div id="prop-nav">

	{{ $properties->previous() }}
	&nbsp;&nbsp;&nbsp;
{{ $properties->next() }}
</div>


	<h1><span style="color: #bb8930;">Find A Property</span></h1>
	<hr />
	<form method="get" id="searchform" action="#">
		<div  style="position: relative;">
			<label>Search by States</label><br /><br />
			<input type="text" value="" name="keyword" id="f">
			
			<!-- watermark script -->
			<script type="text/javascript">
				$('#f').watermark('e.g. Alabama');
			</script>
			<!-- watermark script ends -->

			<br /><br />
			<span style="color: #bb8930; float: right;"><input type="submit" id="playbutton" value="" /> SEARCH</span>
		</div>
	</form>
</div>
<br />
<div id="filter-menu">
<ul>
	<!-- <li style="background: orange;">MOST RECENT</li> -->
	<!-- <li style="background-color: white; color:#f5a604">MOST POPULAR</li> -->
	<li id="most-recent-filter"><a href="{{ URL::current() . '?filter=most-recent' }}">Most Recent</a></li> 
	<li id="most-popular-filter"><a href="{{ URL::current() . '?filter=most-popular' }}">Most Popular</a></li> 
	<li>Filter by:</li>
	<li class="<?php echo (URI::segment(3, 'All') == 'All') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@index') }}">All</a></li> 
	<li class="<?php echo (URI::segment(3, 'All') == 'house') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('house')) }}">House</a></li> 
	<li class="<?php echo (URI::segment(3, 'All') == 'apartment-and-unit') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('apartment-and-unit')) }}">Apartment & Unit</a></li> 
	<li class="<?php echo (URI::segment(3, 'All') == 'apartment') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('apartment')) }}">Apartment</a></li> 
	<li class="<?php echo (URI::segment(3, 'All') == 'unit') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('unit')) }}">Unit</a></li>
	<li class="<?php echo (URI::segment(3, 'All') == 'townhouse') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('townhouse')) }}">Townhouse</a></li> 
	<li class="<?php echo (URI::segment(3, 'All') == 'villa') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('villa')) }}">Villa</a></li>
	<li class="<?php echo (URI::segment(3, 'All') == 'block-of-units') ? 'active-filter' : ''  ?>"><a href="{{ action('properties@search', array('block-of-units')) }}">Block of Units</a></li>
</ul>

	<div class="clear"></div>

</div> 

<div id="properties-outer-con">
<div id="properties-con">
	@foreach($properties->results as $property)
	
		<div class="property-con">

			

		    @foreach($property->images as $image)
		    
		    	<a href="{{ action('properties@property', array($image->property->id)) }}">
		    		<img src="{{ asset('uploads/properties/' . $image->name); }}">
		    		<h4>{{ $property->location }}</h4>
		    	</a>
		    	

		        <?php break; // get only 1 image of the property ?>
		        
		    @endforeach

		</div>

	@endforeach
</div>
</div>

{{-- $properties->links() --}}



	
@endsection
