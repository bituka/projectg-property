@layout('layouts.admin')


@section('content')

    <div class="span12">
        <table id="properties-table" class="table table-striped table-hover">
            <thead>
              <tr>
                  <th width="5%">ID</th>
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
                    <td class="center">{{ $property->state }}</td>
                    
                    @if(! isset($property->category->name))
                        <td class="center">Uncategorized</td>
                    @else
                        <td class="center">{{ $property->category->name }}</td>
                    @endif

                    <td class="center">{{ $property->post_code }}</td>                                                       
                </tr>
                            
            </tbody>
        </table>

    </div>

<div class="clear"></div>


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

            <form method="post" action="{{ url('admin/properties/edit/' . $property->id) }}" accept-charset="UTF-8">
              
                {{ Form::token() }}

                <input type="hidden" name="id" value="{{ $property->id }}">
                
                <label for="title">Title</label>
                <input type="text" id="property-name-field" class="span4" name="title" value="{{ $property->title }}" placeholder="new title">
                
                <label for="description">Description</label>
                <input type="text" id="property-name-field" class="span4" name="description" value="{{ $property->description }}" placeholder="new description">
                
                <label for="location">Location</label>
                <input type="text" id="property-name-field" class="span4" name="location" value="{{ $property->location }}" placeholder="new location">
                
                <label for="rooms">Number of Rooms</label>
                <input type="text" id="property-name-field" class="span4" name="rooms" value="{{ $property->rooms }}" placeholder="new rooms">
                
                <label for="price">Price</label>
                <input type="text" id="property-name-field" class="span4" name="price" value="{{ $property->price }}" placeholder="new price">
                
                <label for="state">State</label>
                <input type="text" id="property-state-field" class="span4" name="state" value="{{ $property->state }}" placeholder="state">

                <label for="category">Category</label>
                {{ Form::select('category', $categories_array, $property->category->name ) }}
            
                <label for="ranking">Ranking</label>
                <input type="text" id="category-name-field" class="span4" name="ranking" value="{{ $property->ranking }}" placeholder="new ranking">

                <label for="post_code">Post Code</label>
                <input type="text" id="property-name-field" class="span4" name="post_code" value="{{ $property->post_code }}" placeholder="new post code">

                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
                <a href="{{ action('admin.properties@manage_imgs', array($property->id)) }}" class="btn btn-info btn-block">Manage Images</a>
            </form>    
        </div>
    </div>





    
@endsection