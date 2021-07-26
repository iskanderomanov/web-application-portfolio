<div class="card-body">
    <div class="form-group">
        <label for="">Родительская категория</label>
        <select class="form-control" name="parent_id">
            <option value="0">-- без родительской категории --</option>
            @include('admin.category.categories')
        </select>
    </div>
    <div class="form-group">
        <label for="">Название</label>
        <input type="text" class="form-control" name="title" placeholder="Введите название категории" value="{{$category->title ?? ""}}" required>
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug ?? ""}}" readonly>
    </div>
    <div class="form-group">
        <label for="">Описание</label>
        <input type="text" class="form-control" name="description"  placeholder="Введите описание категории" value="{{$category->description ?? ""}}" required>
    </div>

</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Добавить</button>
</div>
