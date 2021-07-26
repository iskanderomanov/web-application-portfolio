@extends('admin.layouts.admin_layout')

@section('title', 'Мои контакты')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                            <div class="card-body table-responsive p-0">
                                    <table class="table table-hover table-bordered text-nowrap">
                                            <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Название контакта</th>
                                                        <th>Ссылка на контакт</th>
                                                        <th>HTML-тег иконки</th>
                                                        <th>Действие</th>
                                                        <th>Удалено</th>
                                                </tr>
                                            </thead>
                                    <tbody>
                                    @if(isset($contact))
                                        @foreach($contact as $contact_list)
                                            <tr class="@if($contact_list->deleted_at) card-danger @else card-primary @endif card-outline">
                                            <form action="{{ route('contact.update', $contact_list) }} " method="POST">
                                                {{ method_field('PUT')}}
                                                {{ csrf_field() }}
                                            <td>
                                                {{$contact_list->id}}
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="title" placeholder="Введите название контакта" value="{{$contact_list->title ?? ""}}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="href" placeholder="Введите ссылку" value="{{$contact_list->href ?? ""}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="icon_tag"  placeholder="Введите HTML-тег" value="{{$contact_list->icon_tag ?? ""}}" required>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                            </td>
                                            </form>
                                            @if (isset($contact_list->deleted_at))
                                                <td>
                                                    <form onsubmit="if(confirm('Востановить?')){ return true }else{ return false }" action="{{ route('contact.restore', $contact_list) }}" method="POST">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn" type="submit" style="color: #007bff;">{{$contact_list->deleted_at}} <i class="fa fa-trash-restore-alt"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                                <td>
                                                    <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('contact.destroy', $contact_list) }}" method="POST">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn" style="color: #007bff; padding-top: 0;"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    <form action="{{ route('contact.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="title" placeholder="Введите название контакта" value="" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="href" placeholder="Введите ссылку" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="icon_tag"  placeholder="Введите HTML-тег" value="" required>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Создать</button>
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination clearfix">
                                @if(isset($contact))
                                    {{ $contact->links() }}
                                @endif

                            </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
