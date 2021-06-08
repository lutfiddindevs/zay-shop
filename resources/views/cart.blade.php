@extends('layouts.master')
@section('title', 'Cart')
@section('content')
    
    <div class="container">
        <div class="row my-4">
            <div class="col">
                <div class="card">
                    <div class="card-title">
                        <h3 class="text-center">Items in your Cart</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($cart_items as $key => $items)
                                <tr>
                                  <th scope="row">{{ ++$key }}</th>
                                  <td>{{ $items->product->name }}</td>
                                  <td>{{ $items->category->name }}</td>
                                  <td>{{ $items->product->price }}</td>
                                  <td>@mdo</td>
                                  <td>@mdo</td>
                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 

@endsection