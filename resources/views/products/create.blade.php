@extends('layouts.app')

@section('content')
    <div style="text-align: center;">
        <h1>Add a Product</h1>
        <div style="margin: 20px auto;">
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border rounded-md" placeholder="Name" required>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <select id="category" name="category" class="w-full p-2 border rounded-md" required>
                            @foreach(json_decode('{"Susu":"Susu", "Kopi":"Kopi", "Minyak":"Minyak", "Parfum":"Parfum", "Snack":"Snack", "Sabun":"Sabun", "Shampo":"Shampo","Daging":"Daging","BUAH":"Buah", "Lainnya":"Lainnya"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}">{{$optionValue}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="qty" class="block text-gray-700 text-sm font-bold mb-2">Qty</label>
                        <input type="text" id="qty" name="qty" class="w-full p-2 border rounded-md" placeholder="Qty" required>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                        <input type="text" id="price" name="price" class="w-full p-2 border rounded-md" placeholder="Price" required>
                    </div>

                    <div class="mb-4">
                        <label for="descriptions" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <input type="text" id="descriptions" name="descriptions" class="w-full p-2 border rounded-md" placeholder="Description" required>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save a new product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
