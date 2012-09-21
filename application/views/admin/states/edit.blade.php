@layout('layouts.admin')


@section('content')

    <div class="span12">
        <table id="properties-table" class="table table-striped table-hover">
            <thead>
              <tr>
                  <th width="10%">ID</th>
                  <th width="40%">Name</th>
                  <th width="25%">Created At</th>
                  <th width="25%">Updated At</th>
            
                                                      
              </tr>
            </thead>   
            <tbody>

                <tr>
                    <td class="center">{{ $state->id }}</td>
                    <td class="center title">{{ $state->name }}</td>
                    <td class="center">{{ $state->created_at }}</td>
                    <td class="center">{{ $state->updated_at }}</td>
                                     
                </tr>

    
                              
            </tbody>
        </table>

    </div>


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

            <form method="Post" action="{{ url('states/' . $state->id . '/edit') }}" accept-charset="UTF-8">
                {{ Form::token() }}
                <input type="hidden" name="id" value="{{ $state->id }}">
                <input type="text" id="state-name-field" class="span4" name="name" value="{{ $state->name }}" placeholder="new name">
                <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
            </form>    
        </div>
    </div>



    
@endsection