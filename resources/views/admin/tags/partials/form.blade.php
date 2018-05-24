<label for=''>Статус</label>
<select class="form-control" name='published'>
	@if (isset($tag->id))
		<option value="0" @if ($tag->published==0) selected="" @endif>Не опубликовано</option>
		<option value="1" @if ($tag->published==1) selected="" @endif>Опубликовано</option>
	@else
		<option value="0">Не опубликовано</option>
		<option value="1">Опубликовано</option>
	@endif
</select>
<label for="">Наименование</label><input type="text" class="form-control" name="name" placeholder="Заголовок тега" value ="{{$tag->name or ""}}" required>
<label for=""> Slug</label><input type="text" class="form-control" name="url" placeholder="Автоматическая генерация" value ="{{$tag->url or ""}}" readonly="">
<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить новый тег">