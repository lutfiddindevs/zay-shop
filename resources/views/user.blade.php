@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-6">
			  <h2 class="text-center">Name: {{ auth()->user()->name }}</h2>
			  <h3 class="text-center">Email: {{ auth()->user()->email }}</h3>
			  <h4 class="text-center">Address {{ auth()->user()->address }}</h4>
			  <h5 class="text-center">Account created at: {{ auth()->user()->created_at }}</h5>
			  <h5 class="text-center">Password: {{ auth()->user()->visible_password }}</h5>
			  
			</div>
		</div>
	</div>

@endsection