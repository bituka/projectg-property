@layout('layouts.admin')


@section('content')

	<h2 class="text-info">Manage Properties</h2>

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

<div class="span12">
<table id="properties-table" class="table table-striped table-hover">
	  <thead>
      <tr>
          <th width="5%">ID</th>
          <th width="16%">Title</th>
          <th width="14%">Location</th>
          <th width="8%">Rooms</th>
          <th width="8%">Price</th>
          <th width="8%">State</th>
          <th width="7%">Category</th>
          <th width="7%">Post Code</th>  
          <th width="15%">Actions</th>                                          
      </tr>
  </thead>   
  <tbody>
   

    @foreach($properties->results as $property)

	    <tr>
	        <td class="center">{{ $property->id }}</td>
	        <td class="center title">{{ $property->title }}</td>
	        <td class="center">{{ $property->location }}</td>
	        <td class="center">{{ $property->rooms }}</td>
	        <td class="center">{{ $property->price }}</td>
	        <td class="center">{{ $property->state_id }}</td>
	        <td class="center">{{ $property->category_id }}</td>
	        <td class="center">{{ $property->post_code }}</td>

	        <td class="center">
	     
	           	<a href="{{ url('admin/properties/edit/' . $property->id) }}" class="btn btn-info">Edit</a>
	            <a href="#myModal-{{ $property->id }}" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>

	            <div class="modal hide" id="myModal-{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 
				<div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    <h3 id="myModalLabel">Are you sure you want to delete this?</h3>
				  </div>
				
				  <div class="modal-footer">
				    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				   <!--  <button class="btn btn-primary">Save changes</button> -->
				    <a href="{{ url('admin/properties/delete/' . $property->id) }}" class="btn btn-danger">Confirm Delete</a> 
				  </div>
				</div>



	        </td>                                       
    	</tr>
	    
	@endforeach

	
                                 
  </tbody>
</table>

</div>

<div class="clear"></div>

{{ $properties->links() }}



    
@endsection