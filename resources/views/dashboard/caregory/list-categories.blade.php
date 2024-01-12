@extends('layout.admin-layout')
@section('header')
    <x-content-header title="List all categories" />
@endsection

@section('content')

@if(Session::has('create-success'))
    <div class="alert alert-success">{{Session::get('create-success')}}</div>
@endif

@if(Session::has('update-success'))
    <div class="alert alert-info">{{Session::get('update-success')}}</div>
@endif


@if(Session::has('delete'))
    <div class="alert alert-danger">{{Session::get('delete')}}</div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
@endif

<div class="card">
    <div class="card-header">
        <a href="/admin/create-category" class="btn btn-success btn-sm">Create new category</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                        aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ttile</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $inx => $category)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$inx+1}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <img src="{{asset($category->image)}}" style="width: 100px; border-radius: 10px; object-fit: contain" alt="category image">
                                </td>
                                <td>
                                    <a href="/admin/edit-category/{{$category->id}}" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="/admin/delete-category/{{$category->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
