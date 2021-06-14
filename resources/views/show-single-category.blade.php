@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="col-6">
     <div class="trending-wrapper">
     <a href="/product/{{ $category->product->id }}/show">
        <h1 class="text-center my-4">{{ $category->name }}</h1>
    
        <div class="searched-item">
          <img class="trending-image img-fluid" src="{{ asset('images') }}/{{ $category->product->image }}">
           </a>
          <div class="">
            <h2>{{ $category->description }}</h2>
          </div>
        </div>  
      </div>
  </div>
  </div>
    </div>
 @endsection