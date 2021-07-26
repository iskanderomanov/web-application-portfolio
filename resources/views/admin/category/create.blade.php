@extends('admin.layouts.admin_layout')

@section('title', 'Добавить категорию')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}
                            @include('admin.category.form')
                        </form>
                    </div>
                </div>
           </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
