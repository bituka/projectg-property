@layout('layouts.master')

@section('content')

@include('sliders.eight-col-slider-final')

<div id="bottom-content">
	<div id="image-001">
		<img src="{{ asset('img/image-001.jpg') }}" width="221" height="181">
	</div>
	<div id="image-002">
		<img src="{{ asset('img/image-002.jpg') }}" width="221" height="181">
	</div>
	<div id="image-009">
		<img src="{{ asset('img/img009.jpg') }}" width="451" height="220">
	</div>
	<div id="text-con">
		<div id="text-inner">
			<p id="first-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
			<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
			<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
	</div>
</div>

@endsection