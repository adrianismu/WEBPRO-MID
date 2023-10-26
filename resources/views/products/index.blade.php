@extends('layouts.app')

@section('content')
<div class="text-center">
    <a class="btn btn-primary mb-4" href="{{ route('product.create') }}">{{ __('Add a Product') }}</a>

    <div style="margin: 20px auto; max-width: 85%;">
        <table class="w-full border-2 border-collapse border-blue-500 hover:shadow-md" style="font-size: 18px;">
            <tr class="bg-blue-500 text-white">
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr class="bg-gray-100 hover:bg-gray-200 transition-colors">
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->descriptions}}</td>
                <td><img width="80px" src="{{URL('images')}}/{{$product->image}}"></td>
                <td class="flex justify-center items-center">
                    <form method="GET" action="{{route('product.edit', ['product' => $product])}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Edit</button>
                    </form>
                    <form method="POST" action="{{route('product.delete', ['product' => $product])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="flex justify-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
@endsection
