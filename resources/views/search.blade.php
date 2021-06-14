@extends('layouts.master')
@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="col-6">
     <div class="trending-wrapper">
        <h4 class="text-center">Result for Product</h4>
        @if(count($data) > 0)
        @foreach($data as $item)
      
        <div class="searched-item">
          <a href="/product/{{ $item['id']}}/show">
          <img class="trending-image img-fluid" src="{{ asset('images') }}/{{ $item['image'] }}">
          <div class="">
            <h2>Name: {{ $item['name'] }}</h2>
            </a>
            <h5 class="text-center">Description:  {{$item['description']}}</h5>
            <h6 class="text-center">Price: {{ $item['price'] }} UZS</h6>
            <h6 class="text-center">Category:  {{ $item['category']['name'] }}</h6>
          </div>
        
        </div>  
       
       
        @endforeach
         @else 
         <p class="text-center my-4"><h2>No Product Found</h2></p>
        @endif
      </div>
  </div>
  </div>
    </div>
 @endsection