@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <img
                                src="{{ $product->image ?? 'https://static.vecteezy.com/system/resources/thumbnails/008/695/917/small/no-image-available-icon-simple-two-colors-template-for-no-image-or-picture-coming-soon-and-placeholder-illustration-isolated-on-white-background-vector.jpg' }}"
                                style="width: 100px;"
                            >
                        </div>
                        <div class="card-body">
                            <p class="product-name">Name : {{ $product->name }}</p>
                            <p class="product-price">Price : {{ $product->price }}</p>
                            <p class="product-quantity">Qnt. : {{ $product->quantity }}</p>
                            <p class="table-group-divider"><strong>Options</strong></p>
                            <ul>
                                @foreach($product->options as $options)
                                    <li>{{ $options->key }} : {{ $options->value }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.show', $product) }}" class="btn btn-success">Show</a>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
    $(document).ready(function (){
        $.ajax({
            url: "{{ route('product.index') }} ",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    })
</script>
@endsection
