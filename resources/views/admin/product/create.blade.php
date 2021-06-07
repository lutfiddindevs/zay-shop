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
                    <h2 class="text-center">Add Product</h2>
                </div>
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Price (in UZS)</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Product Price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Choose Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        Product Image
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="image">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

