@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="users" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">View Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="/category" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">View Categories</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/category/create" class="nav-link px-0"> <span class="d-none d-sm-inline">Add Category</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/product" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">View products</span></a>
                        </li>
                        <li>
                            <a href="/product/create" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Add product</span></a>
                        </li>
                        <li>
                            <a href="/banner" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">View Banners</span> </a>
                        </li>
                        <li>
                            <a href="/banner/create" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Add Banner</span> </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">

    <div class="container">
        <div class="row mt-4">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <h2>All Banners</h2>
                    <a href="banner/create" class="float-right"><button type="submit" class="btn btn-success">Add Banner</button></a>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Text</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($banners) > 0)
                        @foreach($banners as $key => $banner)
                            <tr>
                                <th><img src="{{ asset('images') }}/{{ $banner->image }}" width="100"></th>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->subtitle }}</td>
                                <td>{{ $banner->text }}</td>
                                <td>
                                    <a href="{{ route('banner.edit', [$banner->id]) }}"><button class="my-1 btn btn-outline-success">edit</button></a>
                                </td>
                                <td>
                                    <form id="delete-form{{$banner->id}}" method="post" action="{{ route('banner.destroy',[$banner->id]) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a href="#" onclick="if(confirm('Do you want to delete?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form{{$banner->id}}').submit()
                                        }else{
                                        event.preventDefault();
                                        }"><input type="submit" value="Delete" class="btn btn-danger"></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td>No Banner to display</td>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
@endsection

