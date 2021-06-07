@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row my-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h2 class="text-center">{{ $product->name }}</h2>
						<img class="card-img-bottom" src="{{ asset('images') }}/{{ $product->image }}" alt="">
						<h5 class="text-center">{{ $product->description }} <br> <small>Category: {{ $product->category->name }}</small></h5>
					</div>
					<div class="card-footer">
						<p class="text-center">Price: {{ $product->price }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection