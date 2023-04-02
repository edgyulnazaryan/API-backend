@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <img
                            src="{{ $product->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/008/695/917/small/no-image-available-icon-simple-two-colors-template-for-no-image-or-picture-coming-soon-and-placeholder-illustration-isolated-on-white-background-vector.jpg' }}"
                            style="width: 100px;"
                        >
                    </div>
                    <div class="card-body">
                        <p class="product-name">{{ $product->name }}</p>
                        <p class="product-price">{{ $product->price }}</p>
                        <p class="product-quantity">{{ $product->quantity }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('product-options.create', $product) }}" class="btn btn-success">Add options</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
