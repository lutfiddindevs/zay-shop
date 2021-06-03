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
                    <h2>All Categories</h2>
                    <a href="category/create" class="float-right"><button type="submit" class="btn btn-success">Add Category</button></a>
                </div>
                <table class="table table-striped mt-4">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(is_countable($categories) && count($categories) > 0)
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('category.edit', [$category->id]) }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form id="delete-form{{$category->id}}" method="post" action="{{ route('category.destroy',[$category->id]) }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a href="#" onclick="if(confirm('Do you want to delete?')) {
                                        event.preventDefault();
                                        document.getElementById('delete-form{{$category->id}}').submit()
                                        }else{
                                        event.preventDefault();
                                        }"><input type="submit" value="Delete" class="btn btn-danger"></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td>No Category to display</td>
                    @endif
                    </tbody>
                </table>
                </table>
            </div>
        </div>
    </div>
@endsection

