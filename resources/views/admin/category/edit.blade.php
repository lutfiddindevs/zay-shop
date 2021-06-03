@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <h2>Edit Category</h2>
                </div>
                <form action="{{ route('category.update', [$category->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Category Name" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"> {{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
