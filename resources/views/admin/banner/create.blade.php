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
                    <h2>Add Banner</h2>
                </div>
                <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Banner Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Banner Title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Banner Subtitle</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Banner Subtitle" name="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Banner Text</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                    </div>
                    <div class="mb-3">
                        Banner Image
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="image">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Add Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

