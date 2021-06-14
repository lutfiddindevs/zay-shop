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
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                    </form>
                </div>
			</div>
		</div>
	</div>

@endsection
