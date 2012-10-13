@layout('layouts.admin')


@section('content')

    <h2 class="text-info">Manage News</h2>

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
<table id="categories-table" class="table table-striped table-hover">
      <thead>
      <tr>
          <th width="5%">ID</th>
          <th width="40%">Title</th>
          <th width="17.5%">Created at</th>
          <th width="17.5%">Last Update</th>   
          <th width="15%">Actions</th>                                          
      </tr>
  </thead>   
  <tbody>
   

    @foreach($news->results as $news)

        <tr>
            <td class="center">{{ $news->id }}</td>
            <td class="center title">{{ $news->title }}</td>
            <td class="center">{{ $news->created_at }}</td>
            <td class="center">{{ $news->updated_at }}</td>
            <td class="center">
         
               <a href="{{ url('admin/news/edit/' . $news->id) }}" class="btn btn-info">Edit</a>
               
                <a href="#myModal-{{ $news->id }}" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>

                <div class="modal hide" id="myModal-{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Are you sure you want to delete this?</h3>
                  </div>
                
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                   <!--  <button class="btn btn-primary">Save changes</button> -->
                    <a href="{{ url('admin/news/delete/' . $news->id) }}" class="btn btn-danger">Confirm Delete</a> 
                  </div>
                </div>

            </td>                                       
        </tr>
        
    @endforeach

    
                                 
  </tbody>
</table>

</div>

<div class="clear"></div>

{{-- $news->links() --}}



    
@endsection