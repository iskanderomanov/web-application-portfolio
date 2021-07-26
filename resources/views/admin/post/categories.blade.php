@foreach ($categories as $category)
    <option value="{{$category->id ?? ""}}"
        @isset($post->id)
                @if($category->id == $post->category_id)
                    selected="selected"
                @endif


        @endisset
    >
        {{ $delimiter ?? "" }}{{ $category->title ?? "" }}
    </option>
    @if(count($category->children) > 0)
        @include('admin.post.categories', [
            'categories' => $category->children,
            'delimiter'  => ' - ' . $delimiter,
        ])
    @endif
@endforeach
