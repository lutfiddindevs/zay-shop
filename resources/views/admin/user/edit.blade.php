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
          
            <div class="span9">
                    <div class="content">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        
                        <div class="module">
                            <div class="module-head">
                                <h3>Update User</h3>
                            </div>
                            <div class="module-body">
                                <form action="/admin/user/{{$user->id}}/update" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="enter user's name" value="{{ old('name') }}" value="{{ $user->name }}">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="email">Email</label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span8 @error('question') border-red @enderror" placeholder="enter your email" value="{{ $user->email }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="password">Password</label>
                                        <div class="controls">
                                            <input type="password" name="password" class="span8 @error('password') border-red @enderror" placeholder="enter your password" value="{{ $user->visible_password }}">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="address">Address</label>
                                        <div class="controls">
                                            <input type="text" name="address" class="span8 @error('address') border-red @enderror" placeholder="enter your address" value="{{ $user->address }}">
                                        </div>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="control-group my-4">
                                        <button class="btn btn-success" type="submit">Update User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>

        </div>
    </div>
</div>

@endsection