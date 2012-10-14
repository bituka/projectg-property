@layout('layouts.second_master')

@section('content')
<div class="find_prop">
	<h1><span style="color: #bb8930;">Find A Property</span></h1>
	<hr />
	<form method="get" id="searchform" action="#">
		<div>
			<label>Suburbs, States, or Postcodes</label><br /><br />
			<input type="text" value="e.g. Melbourn City" name="f" id="f" onfocus="defaultInput(this)" 	="clearInput(this)">
			<br /><br />
			<span style="color: #bb8930; float: right;"><input type="submit" id="playbutton" value="" /> SEARCH</span>
		</div>
	</form>
</div>
<br />
<div id="filter-menu">
<ul>
	<li style="background: orange;">MOST RECENT</li>
	<li style="background-color: white; color:#f5a604">MOST POPULAR</li>
	<li style="margin-left: 20px;"><a href="#">Filter by:<a/></li>
	<li style="background: red;"><a href="<?php echo URL::to('find_prop'); ?>">All</a></li> 
	<li><a href="{{ action('properties@search', array('house')) }}">House<a/></li> 
	<li><a href="{{ action('properties@search', array('Apartment-and-Unit')) }}">Apartment & Unit<a/></li> 
	<li><a href="{{ action('properties@search', array('Apartment')) }}">Apartment<a/></li> 
	<li><a href="{{ action('properties@search', array('Unit')) }}">Unit<a/></li>
	<li><a href="{{ action('properties@search', array('Townhouse')) }}">Townhouse<a/></li> 
	<li><a href="{{ action('properties@search', array('Villa')) }}">Villa<a/></li>
	<li><a href="{{ action('properties@search', array('Block-of-Units')) }}">Block of Units<a/></li>
</ul>
	
	<div class="clear"></div>

</div> 

<div id="properties-outer-con">
<div id="properties-con">
	@foreach($properties->results as $property)
	
		<div class="property-con">

			

		    @foreach($property->images as $image)
		    
		    	<img src="{{ asset('uploads/properties/' . $image->name); }}">

		    	<h4>{{ $property->location }}</h4>

		        <?php break; // get only 1 image of the property ?>
		        
		    @endforeach

		</div>

	@endforeach
</div>
</div>


{{ $properties->links() }}
	
@endsection
