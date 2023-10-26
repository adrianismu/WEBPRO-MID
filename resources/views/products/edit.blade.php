@extends('layouts.app')

@section('content')
    <div style="text-align: center;">
        <h1>Edit a Product</h1>
        <form method="POST" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded-md" placeholder="Name" value="{{$product->name}}" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                    <select id="category" name="category" class="w-full p-2 border rounded-md" required>
                        @foreach(json_decode('{"Susu":"Susu", "Kopi":"Kopi", "Minyak":"Minyak", "Parfum":"Parfum", "Snack":"Snack", "Sabun":"Sabun", "Shampo":"Shampo"}', true) as $optionKey => $optionValue)
                        <option value="{{$optionKey}}" {{ $optionKey == $product->category ? 'selected' : '' }}>{{$optionValue}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="qty" class="block text-gray-700 text-sm font-bold mb-2">Qty</label>
                    <input type="text" id="qty" name="qty" class="w-full p-2 border rounded-md" placeholder="Qty" value="{{$product->qty}}" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="text" id="price" name="price" class="w-full p-2 border rounded-md" placeholder="Price" value="{{$product->price}}" required>
                </div>

                <div class="mb-4">
                    <label for="descriptions" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <input type="text" id="descriptions" name="descriptions" class="w-full p-2 border rounded-md" placeholder="Description" value="{{$product->descriptions}}" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                    <img class="mt-2" width="20%" src="{{URL('images')}}/{{$product->image}}" alt="Product Image" />
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
