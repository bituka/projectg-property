@layout('layouts.admin')


@section('content')

	<div class="row">
        <div class="span4 offset4 well">
           <h4 class="text-info">Input new details</h4>
        
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

            <form method="Post" action="{{ action('admin.news@edit', array($news->id)) }}" accept-charset="UTF-8">
                {{ Form::token() }}
                <input type="hidden" name="id" value="{{ $news->id }}">
                <input type="text" id="category-name-field" class="span4" name="title" value="{{ $news->title }}" placeholder="new title">
                {{ Form::textarea('content', $news->content) }}
                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
            </form>    
        </div>
    </div>



    
@endsection