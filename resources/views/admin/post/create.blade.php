@extends('admin.layouts.admin_layout')

@section('title', 'Добавить статью')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('post.store') }}" method="post">
                            {{ csrf_field() }}
                            @include('admin.post.form')
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
