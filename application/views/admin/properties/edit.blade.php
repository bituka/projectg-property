@layout('layouts.admin')


@section('content')

    <div class="span12">
        <table id="properties-table" class="table table-striped table-hover">
            <thead>
              <tr>
                  <th width="2%">ID</th>
                  <th width="16%">Title</th>
                  <th width="16%">Description</th>
                  <th width="8%">Location</th>
                  <th width="8%">Rooms</th>
                  <th width="8%">Price</th>
                  <th width="8%">State</th>
                  <th width="8%">Category</th>
                  <th width="8%">Post Code</th>  
                                                      
              </tr>
            </thead>   
            <tbody>

                <tr>
                    <td class="center">{{ $property->id }}</td>
                    <td class="center title">{{ $property->title }}</td>
                    <td class="center">{{ $property->description }}</td>
                    <td class="center">{{ $property->location }}</td>
                    <td class="center">{{ $property->rooms }}</td>
                    <td class="center">{{ $property->price }}</td>
                    <td class="center">{{ $property->state_id }}</td>
                    <td class="center">{{ $property->category_id }}</td>
                    <td class="center">{{ $property->post_code }}</td>

                                                        
                </tr>

    
                              
            </tbody>
        </table>

    </div>

<div class="clear"></div>


	<div class="row">
        <div class="span4 offset4 well">
            <h4 class="text-info">Now editing property id #{{ $property->id }}</h4>
           
        
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

            <form method="Post" action="{{ url('categories/' . $property->id . '/edit') }}" accept-charset="UTF-8">
                {{ Form::token() }}
                <input type="hidden" name="id" value="{{ $property->id }}">
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new title">
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new description">
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new location">
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new rooms">
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new price">
                {{ Form::select('state', $states_array) }}
                {{ Form::select('category', $categories_array) }}
                <input type="text" id="property-name-field" class="span4" name="name" placeholder="new post code">

            
                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
                <a href="#" class="btn btn-info btn-block">Manage Images</a>
            </form>    
        </div>
    </div>





    
@endsection