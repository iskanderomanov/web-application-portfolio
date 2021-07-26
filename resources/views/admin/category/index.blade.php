@extends('admin.layouts.admin_layout')

@section('title', 'Все категории')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Категории</h3>

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
                                    <th>Slug</th>
                                    <th>Описание</th>
                                    <th>Создано</th>
                                    <th>Обновлено</th>
                                    <th>Удалено</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr class="@if($category->deleted_at) card-danger @else card-primary @endif card-outline">
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('category.edit', $category)}}">{{$category->title}}</a></td>

                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>{{$category->updated_at}}</td>
                                    @if ($category->deleted_at)
                                    <td>
                                        <form onsubmit="if(confirm('Востановить?')){ return true }else{ return false }" action="{{ route('category.restore', $category) }}" method="POST">
                                            {{ method_field('put') }}
                                            {{ csrf_field() }}
                                            <button class="btn" type="submit" style="color: #007bff;">{{$category->deleted_at}} <i class="fa fa-trash-restore-alt"></i></button>
                                        </form>

                                    </td>
                                    @else
                                        <td>
                                            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('category.destroy', $category) }}" method="POST">
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
