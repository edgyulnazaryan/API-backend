@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('product-options.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="key">Name</label>
                        <input type="text" name="key" id="key" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="value">Value</label>
                        <input type="text" name="value" id="value" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-outline-dark btn-block w-100">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
