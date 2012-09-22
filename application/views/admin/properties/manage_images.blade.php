@layout('layouts.admin')


@section('content')

  <a href="#myModal-add-more-img" role="button" class="btn btn-info pull-right" data-toggle="modal">Add more images</a>
  <div class="clear"></div>


   @if(Session::has('success'))  
      <div class="alert alert-success">
          <a class="close" data-dismiss="alert" href="#">×</a>{{ Session::get('success') }}
      </div>
  @endif
  

   <div class="modal hide" id="myModal-add-more-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Are you sure you want to delete this?</h3>
                </div>
              
                <div class="modal-footer">
                 
                      {{ Form::open_for_files( URL::to_route('add_img') ) }}

                          {{ Form::token() }}

                          {{ Form::hidden('property_id', URI::segment(2)) }}

                          {{ Form::file('picture') }}

                          {{ Form::submit('Submit', $attributes = array('class' => 'btn btn-info')) }}
                      {{ Form::close() }}
                  
                </div>
              </div>





  <ul class="thumbnails">
      @foreach($imgs as $img)  
          <li class="span4">
              <a href="#" class="thumbnail">
                <img src="{{ asset('uploads/properties/' . $img->name ) }}" width="290">
              </a>



              <a href="#myModal-{{ $img->id }}" role="button" class="btn btn-danger  btn-block" data-toggle="modal">Delete</a>

              <div class="modal hide" id="myModal-{{ $img->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Are you sure you want to delete this?</h3>
                </div>
              
                <div class="modal-footer">
                 
                 <!--  <button class="btn btn-primary">Save changes</button> -->
                  {{ Form::open( URL::to_route('delete_img') ) }}

                      {{ Form::hidden('property_id', URI::segment(2)) }}
                      {{ Form::hidden('img_id', $img->id) }}

                      {{ Form::submit('Confirm Delete', $attributes = array('class' => 'btn btn-danger')) }}
                  
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                 
                 {{ Form::close() }}

                  
                </div>
              </div>
            
              
              

          </li>
      @endforeach 
  </ul>


      



    
@endsection
