@layout('layouts.admin')

@section('content')


    <div class="container">
    <div class="row">
        <div class="span4 offset4 well">
            <legend>Add State</legend>
        
            @if(Session::has('errors'))
               @foreach(Session::get('errors') as $error)         
                   {{ $error }}
               @endforeach
            @endif
         
            @if(Session::has('success'))   
                {{ Session::get('success') }}
            @endif

            @if (Session::has('login_errors'))
                <div class="alert alert-error">
                    <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
                </div>
            @endif

            <form method="Post" action="add" accept-charset="UTF-8">
            <input type="text" id="state-name-field" class="span4" name="name" placeholder="name">
            <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
            </form>    
        </div>
    </div>
</div>

    
@endsection

