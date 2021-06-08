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
                    <h2>All Product</h2>
                    <a href="product/create" class="float-right"><button type="submit" class="btn btn-success">Add Product</button></a>
                </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($products) > 0)
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <th><img src="{{ asset('images') }}/{{ $product->image }}" width="100"></th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }} UZS</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', [$product->id]) }}"><button class="my-1 btn btn-outline-success">edit</button></a>
                                    </td>
                                    <td>
                                        <form id="delete-form{{$product->id}}" method="post" action="{{ route('product.destroy',[$product->id]) }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="#" onclick="if(confirm('Do you want to delete?')) {
                                            event.preventDefault();
                                            document.getElementById('delete-form{{$product->id}}').submit()
                                            }else{
                                            event.preventDefault();
                                            }"><input type="submit" value="Delete" class="btn btn-danger"></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td>No Product to display</td>
                        @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection

