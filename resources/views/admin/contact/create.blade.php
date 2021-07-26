<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{ route('contact.update') }} " method="POST">
                        {{ method_field('PUT')}}
                        {{ csrf_field() }}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Название контакта</label>
                                    <input type="text" class="form-control" name="title" placeholder="Введите название контакта" value="{{$category->title ?? ""}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Ссылка на контакт</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Введите ссылку" value="{{$category->slug ?? ""}}">
                                </div>
                                <div class="form-group">
                                    <label for="">HTML-тег иконки</label>
                                    <input type="text" class="form-control" name="description"  placeholder="Введите HTML-тег" value="{{$category->description ?? ""}}" required>
                                </div>

                            </div>
                            <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
