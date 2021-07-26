<div class="card-body">
    <div class="form-group">
        <label for="">Выбрать категорию статьи</label>
        <select class="form-control" name="category_id">
            <option value="0">-- без категории --</option>
            @include('admin.post.categories')
        </select>
    </div>
    <div class="form-group">
        <label for="">Выбрать автора статьи</label>

        <select class="form-control" name="user_id">
            <option value="{{ Auth::user()->id }}">-{{ Auth::user()->name }}-</option>
            @include('admin.post.users')
        </select>
    </div>
    <div class="form-group">
        <label for="">Название</label>
        <input type="text" class="form-control" name="title" placeholder="Введите название статьи" value="{{$post->title ?? ""}}" required>
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$post->slug ?? ""}}" readonly>
    </div>
    <div class="form-group">
        <label for="">Описание</label>
        <input type="text" class="form-control" name="description"  placeholder="Введите описание категории" value="{{$post->description ?? ""}}">
    </div>
    <div class="form-group">
        <label for="">Потрачено времени</label>
        <input type="text" class="form-control" name="hours_spent"  placeholder="Введите сколько часов потрачено на работу" value="{{$post->hours_spent ?? ""}}">
    </div>
    <div class="form-group">
        <label for="">Картинка</label>
        <input type="file" accept="image/*,image/jpeg,image/png"  class="form-control" name="image" value="{{$post->image ?? ''}}">
    </div>
    <div class="img_wrap" style="width: 300px;height: 200px;border-style: solid;">
        <img src="/image/@if(isset($post->image)){{$post->image}}@endif" style="width: 100%; height: 100%; object-fit: cover; object-position: 0 0;">
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input"  name="published_status" value="0">
        <input type="checkbox" class="form-check-input" name="published_status" value="1"
               @if(isset($post->published_status))
                   {{ ($post->published_status == 1 ? 'checked' : '') }}
               @endif
        >
        <label class="form-check-label" for="exampleCheck1">Опубликовать</label>
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Добавить</button>
</div>
