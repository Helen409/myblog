<label for=''>Статус страницы</label>
<select class="form-control" name='published'>
	@if (isset($page->id))
		<option value="0" @if ($page->published==0) selected="" @endif>Не опубликовано</option>
		<option value="1" @if ($page->published==1) selected="" @endif>Опубликовано</option>
	@else
		<option value="0">Не опубликовано</option>
		<option value="1">Опубликовано</option>
	@endif
</select>
<label for="">Название страницы</label><input type="text" class="form-control" name="name" placeholder="Название страницы" value ="{{$page->name or ""}}" required>
<label for="">Описание</label><input type="text" class="form-control" name="description" placeholder="Описание категории" value ="{{$page->description or ""}}" >
<label for=""> Slug</label><input type="text" class="form-control" name="url" placeholder="Автоматическая генерация" value ="{{$page->url or ""}}" readonly="">
<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить страницу">