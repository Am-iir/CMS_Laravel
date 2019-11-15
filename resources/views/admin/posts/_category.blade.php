@php
    ++$space;
@endphp
<option value="{{$category->id}}">
    @for($i=1; $i<$space;$i++)&nbsp;&nbsp;@endfor
    {{$category->name}}
</option>
@if (isset($category->children) && $category->children->isNotEmpty())
    @foreach($category->children as $subCat)
        @include('admin.posts._category', ['category' => $subCat, 'space' => $space])
    @endforeach
@endif
