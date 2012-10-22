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
                <label for="title">Title</label>
                <input type="text" id="category-name-field" class="span4" name="title" value="{{ $news->title }}" placeholder="new title">
                <label for="ranking">Ranking</label>
                <input type="text" id="category-name-field" class="span4" name="ranking" value="{{ $news->ranking }}" placeholder="new ranking">

                <label for="content">Content</label>
                {{ Form::textarea('content', $news->content) }}
                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>

                <a href="{{ action('admin.news@manage_imgs', array($news->id)) }}" class="btn btn-info btn-block">Manage Images</a>

            </form>    
        </div>
    </div>



    
@endsection