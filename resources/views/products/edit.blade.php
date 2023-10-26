<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <form method="POST" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input placeholder="Name" type="text" name="name" value="{{$product->name}}" /><br />

            <label>Category</label>
            <select name="category">
                @foreach(json_decode('{"Susu":"Susu", "Kopi":"Kopi", "Minyak":"Minyak", "Parfum":"Parfum", "Snack":"Snack", "Sabun":"Sabun", "Shampo":"Shampo"}', true) as $optionKey => $optionValue)
                <option value="{{$optionKey}}">{{$optionValue}}</option>
                @endforeach
            </select><br />

            <label>Qty</label>
            <input placeholder="Qty" type="text" name="qty" value="{{$product->qty}}" /><br />

            <label>Price</label>
            <input placeholder="Price" type="text" name="price" value="{{$product->price}}" /><br />

            <label>Description</label>
            <input placeholder="Description" type="text" name="descriptions" value="{{$product->descriptions}}" /><br />

            <input type="file" name="image" accept="image/*" /><br />
            <img width="20%" src="{{URL('images')}}/{{$product->image}}" />
        </div>

        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>