@layout('layouts.master')

@section('content')
<div class="find_prop">
	<h1><span style="color: #bb8930;">Find A Property News</span></h1>
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
	<li style="background-color: #f5a604; height: 5px;">MOST RECENT</li>
	<li style="background-color: white; color:#f5a604; height: 5px;" >MOST POPULAR</li>
	<li>Filter by:</li>
	<li>All</li> 
	<li>House</li> 
	<li>Apartment & Unit</li> 
	<li>Apartment Unit</li> 
	<li>Townhouse</li> 
	<li>Villa</li>
	<li>Block of Units</li>
</ul>
</div> 
<div id="news_gallery">
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
	<div class="entry">
		<div class="pic">
			<img src="img/pic1.jpg" />
		</div>
		<div class="label">
			Southbank, Victoria 
		</div>
	</div>
</div>
<div class="map-label"><span style="display: block; margin-top:8px; margin-left:30px;">< Location <strong>MAP</strong></span></div>
<div id="ecs-nav">
		<button id="prev-btn" class="with-hover" data-dir="prev">&lt; previous</button>
		<button id="next-btn" class="with-hover" data-dir="next">next &gt;</button>
</div>  
	
@endsection
