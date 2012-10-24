@layout('layouts.master')

@section('content')

<div class="find_prop">

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

@endsection
