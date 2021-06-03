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
@endsection

