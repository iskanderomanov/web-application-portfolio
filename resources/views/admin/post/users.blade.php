@foreach ($users as $user_list)
    <option value="{{$user_list->id ?? ""}}"
            @if( Auth::user()->id == $user_list->id)
            hidden=""
            @endif
    >
        {{ $user_list->name ?? "" }}
    </option>
@endforeach
