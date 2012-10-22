@layout('layouts.admin')

@section('content')


    <div class="container">
    <div class="row">
        <div class="span4 offset4 well">
             <h2 class="text-info">Add News</h2>
        
            @if(Session::has('errors'))
               @foreach(Session::get('errors') as $error)         
                    <div class="alert alert-error">
                        <a class="close" data-dismiss="alert" href="#">×</a>{{ $error }}
                    </div>
               @endforeach
            @endif
         
            @if(Session::has('success'))  
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert" href="#">×</a>{{ Session::get('success') }}
                </div>
            @endif

            <!-- <form method="Post" action="add" accept-charset="UTF-8"> -->
            <form action="{{ action('admin.news@add'); }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                
                {{ Form::token() }} 

                <input type="text" class="span4" name="title" placeholder="title">

                <textarea rows="3" class="span4" name="content" placeholder="content"></textarea>

                <input type="text" class="span4" name="ranking" placeholder="ranking, this is optional">

                {{ Form::file('picture[]') }}

                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
            </form>    
        </div>
    </div>
</div>

    
@endsection

