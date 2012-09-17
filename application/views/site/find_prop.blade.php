@layout('layouts.master')

@section('content')
<div class="find_prop">
	<h1><span style="color: #bb8930;">Find A Property</span></h1>
	<hr />
	<form method="get" id="searchform" action="#">
		<div>
			<label>Suburbs, States, or Postcodes</label><br /><br />
			<input type="text" value="e.g. Melbourn City" name="f" id="f" onfocus="defaultInput(this)" 	="clearInput(this)">
			<!--<input type="submit" id="searchsubmit" value=" " />-->
			<input type="button" value="submit" />
		</div>
	</form>
		
</div>
 
  
	
@endsection
