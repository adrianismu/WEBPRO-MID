<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input placeholder="Name" type="text" name="name" />

            <label>Category</label>
            <select name="category">
                @foreach(json_decode('{"Susu":"Susu", "Kopi":"Kopi", "Minyak":"Minyak", "Parfum":"Parfum", "Snack":"Snack", "Sabun":"Sabun", "Shampo":"Shampo"}', true) as $optionKey => $optionValue)
                <option value="{{$optionKey}}">{{$optionValue}}</option>
                @endforeach
            </select><br />

            <label>Qty</label>
            <input placeholder="Qty" type="text" name="qty" />

            <label>Price</label>
            <input placeholder="Price" type="text" name="price" />

            <label>Description</label>
            <input placeholder="Description" type="text" name="descriptions" />

            <input type="file" name="image" accept="image/*" />
        </div>

        <div>
            <input type="submit" value="Save a new product" />
        </div>
    </form>
</body>
</html>