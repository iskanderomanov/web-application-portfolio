@extends('admin.layouts.admin_layout')

@section('title', 'Все статьи')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Статьи</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Категория</th>
                                    <th>Автор</th>
                                    <th>Картинка</th>
                                    <th>Slug</th>
                                    <th>Описание</th>
                                    <th>Время работы</th>
                                    <th>Статус</th>
                                    <th>Создано</th>
                                    <th>Обновлено</th>
                                    <th>Опубликовано в</th>
                                    <th>Удалено</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr class="@if($post->deleted_at) card-danger @elseif($post->published_status == 0) card-gray @else card-primary @endif card-outline">
                                        <td>{{$post->id}}</td>
                                        <td><a href="{{route('post.edit', $post)}}">{{$post->title}}</a></td>

                                        <td>{{$categories->find($post->category_id)->title}}</td>
                                        <td>{{$users->find($post->user_id)->name}}</td>
                                        <td>{{$post->image}}</td>
                                        <td>{{$post->slug}}</td>
                                        <td>{{$post->description}}</td>
                                        <td>{{$post->hours_spent}}</td>

                                        <td>{{($post->published_status) ? 'Опубликовано' : 'Не опубликовано'}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>
                                        <td>{{$post->published_at}}</td>
                                        @if($post->deleted_at)
                                            <td>
                                                <form onsubmit="if(confirm('Востановить?')){ return true }else{ return false }" action="{{ route('post.restore', $post) }}" method="POST">
                                                    {{ method_field('put') }}
                                                    {{ csrf_field() }}
                                                    <button class="btn" type="submit" style="color: #007bff;">{{$post->deleted_at}} <i class="fa fa-trash-restore-alt"></i></button>
                                                </form>

                                            </td>
                                        @else
                                            <td>
                                                <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('post.destroy', $post) }}" method="POST">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn" style="color: #007bff; padding-top: 0;"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination clearfix">
                            {{ $posts->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
