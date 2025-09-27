@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Cart</h1>
        @if(!empty($cartItems))
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $key => $item)
                        @php $total = $total + ($item['price'] ?? 0) * (int)($item['quantity'] ?? 0)
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['quantity'] ?? 0 }}</td> <!-- Fallback to 0 if quantity is not set -->
                            <td>${{ (float)($item['price'] ?? 0) * (int)($item['quantity'] ?? 0) }}</td>

                            <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan='5' class='text-end'><h3>Total:{{ $total }}</h3></td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
