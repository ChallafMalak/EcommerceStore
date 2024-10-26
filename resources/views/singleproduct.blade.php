@extends('layouts.master2', ['title' => 'Single Products'])

@section('contente')
    <!-- single product -->


    <div class="single-product mt-150 mb-150">
        <div class="container">
            @foreach ($produits as $item)
                <div class="row" style="padding-bottom: 10px !important;">
                    <div class="col-md-5" style="display: flex; justify-content: center; align-items: center;">
                        <div class="single-product-img">
                            <img style="max-height: 250px !important; min-height: 250px !important; max-width: 250px !important; min-width: 250px !important;"
                                src="{{ url($item->imagepath) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="single-product-content">
                            <h3> {{ $item->name }} </h3>
                            <p class="single-product-pricing"> ${{ $item->price }}</p>
                            <p> {{ $item->description }} </p>
                            <div class="single-product-form">
                                <form action="index.html">
                                    <input type="number" placeholder="0">
                                </form>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="price" value="{{ $item->price }}">

                                    <button class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to cart</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end single product -->
@endsection
