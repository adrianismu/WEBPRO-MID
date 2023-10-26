<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <a href="{{route('product.create')}}">Create a product</a>

    <div>
        <br />
        <form method="GET" action="{{route('product.index')}}" accept-charset="UTF-8" role="search">
            Search product
            <input type="text" placeholder="Search for products" name="search" value="{{request('search')}}" />
            <input type="submit" value="Search" />
        </form>

        <table border="1">
            <tr>
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
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->qty}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->descriptions}}</td>
                <td><img width="80px" src="{{URL('images')}}/{{$product->image}}"></td>
                <td><a href="{{route('product.edit', ['product' => $product])}}">Edit</a> <a href="{{route('product.delete', ['product' => $product])}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>