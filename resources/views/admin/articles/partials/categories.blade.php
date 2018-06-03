
@foreach ($categories as $category)
@if ($category->published==1) 
   <option value="{{$category->id or ''}}" Категория
   @if (isset ($article->id) )
       @if ($category->id == $article->category_id) 
          selected="selected" 
        @endif 
   @endif
    > 
   {{$category->name or ""}}
  </option> 
 
@endif
@endforeach 