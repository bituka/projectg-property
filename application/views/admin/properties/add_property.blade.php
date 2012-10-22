@layout('layouts.admin')

@section('content')


    <div class="container">
    <div class="row">
        <div class="span4 offset4 well">
    
            <h2 class="text-info">Add Property</h2>
        
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

            <form action="add" method="post" enctype="multipart/form-data" accept-charset="UTF-8">

                {{ Form::token() }}
                
                <input type="text" id="property-name-field" class="span4" name="title" placeholder="title">
                <input type="text" id="property-description-field" class="span4" name="description" placeholder="description">
                <input type="text" id="property-location-field" class="span4" name="location" placeholder="location">
                <input type="text" id="property-rooms-field" class="span4" name="rooms" placeholder="rooms">
                <input type="text" id="property-price-field" class="span4" name="price" placeholder="price">
                <input type="text" id="property-state-field" class="span4" name="state" placeholder="state">

                {{ Form::select('category', $categories_array, '' , array('class' => 'span4')) }}

                <input type="text" id="property-post-code-field" class="span4" name="post_code" placeholder="post code">
              
                <input type="text" class="span4" name="ranking" placeholder="ranking, this is optional">
              
                {{ Form::file('picture[]') }}
                {{ Form::file('picture[]') }}
                {{ Form::file('picture[]') }}
                {{ Form::file('picture[]') }}
                {{ Form::file('picture[]') }}

                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
            </form>    

            {{ Form::open_for_files('problems/new', "POST", array("class" => "form-horizontal"))}}
        </div>
    </div>
</div>

    
@endsection

