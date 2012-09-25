@layout('layouts.admin')


@section('content')

  <a href="#myModal-add-more-img" id="add-more-img-btn" role="button" class="btn btn-info pull-right" data-toggle="modal">Add more images</a>
  <div class="clear"></div>


    @if(Session::has('errors'))
      
            <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>{{ $errors }}
            </div>

    @endif


   @if(Session::has('success'))  
      <div class="alert alert-success">
          <a class="close" data-dismiss="alert" href="#">×</a>{{ Session::get('success') }}
      </div>
  @endif
  

   <div class="modal hide" id="myModal-add-more-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Browse a picture to be uploaded</h3>
                </div>
              
                <div class="modal-footer">
                 
                      {{ Form::open_for_files( action('admin.properties@add_img') ) }}

                          {{ Form::token() }}

                          {{ Form::hidden('property_id', URI::segment(4)) }}

                          {{ Form::file('picture') }}

                          {{ Form::submit('Submit', $attributes = array('class' => 'btn btn-info')) }}
                      {{ Form::close() }}
                  
                </div>
              </div>





  <ul class="thumbnails">
      @foreach($imgs as $img)  
          <li class="span4">
              <a href="{{ asset('uploads/properties/' . $img->name ) }}" class="thumbnail">
                <img src="{{ asset('uploads/properties/' . $img->name ) }}" width="290">
              </a>



              <a href="#myModal-{{ $img->id }}" role="button" class="btn btn-danger  btn-block" data-toggle="modal">Delete</a>

              <div class="modal hide" id="myModal-{{ $img->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">Are you sure you want to delete this?</h3>
                </div>
              
                <div class="modal-footer">
                 
                  {{ Form::open( action('admin.properties@delete_img', array($img->id)) ) }}

                      {{ Form::token() }}

                      {{ Form::hidden('property_id', URI::segment(4)) }}
                      {{ Form::hidden('img_id', $img->id) }}

                      {{ Form::submit('Confirm Delete', $attributes = array('class' => 'btn btn-danger')) }}
                  
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                 
                 {{ Form::close() }}

                  
                </div>
              </div>
            
              
              

          </li>
      @endforeach 
  </ul>


<!-- jquery lightbox plugin -->
<script type="text/javascript">
$(function() {
  console.log('jquery lightbox working!');
  $('.thumbnails a.thumbnail').lightBox({fixedNavigation:true});
});
</script>
<!-- jquery lightbox plugin ENDS -->


    
@endsection