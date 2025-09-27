@extends('layouts.app')

@section('content')
    <h1>Food Menu</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Description</th>
                <th class="py-2 px-4 border">Price</th>
                <th class="py-2 px-4 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menu as $menus)
            <tr>
                <td class="py-2 px-4 border">{{ $menus->name }}</td>
                <td class="py-2 px-4 border">{{ $menus->description }}</td>
                <td class="py-2 px-4 border">${{ $menus->price }}</td>
                <td class="py-2 px-4 border">
 <a href="{{ route('add.to.cart', $menus->id) }}"
                           class="btn border-blue-500">
                            Add To Cart
                        </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

@endsection
