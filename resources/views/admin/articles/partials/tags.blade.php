@foreach ($tags as $tag) 
 @if ($tag->published==1) 
  <option value="{{$tag->id or ''}}" 
 
   @if (isset($article->id)) 
      @foreach ($article->tags as $tag_article) 
        @if ($tag->id == $tag_article->id) 
          selected="selected" 
        @endif 
      @endforeach 
    @endif 
 
    > 
   {{$tag->name or ""}} 
  </option> 
 
@endif 
@endforeach 