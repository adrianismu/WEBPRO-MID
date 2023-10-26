@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-12">
    <h1 class="text-4xl font-semibold text-center">Welcome to Campus Mart</h1>
    <p class="text-lg text-center mt-4">Explore our products.</p>
    <div class="text-center mt-8">
        <a href="{{ route('product.list') }}" class="btn btn-primary">View Products</a>
    </div>
</div>
@endsection