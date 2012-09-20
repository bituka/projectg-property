index of manage states

@foreach($states->results as $state)

    {{ $state->name }}
    
@endforeach

{{ $states->links($adjacent = 3) }}