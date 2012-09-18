@layout('layouts.admin')

@section('content')
	
	welcome to the dashboard!

	{{ HTML::link_to_route('logout', 'Logout') }}

	
@endsection