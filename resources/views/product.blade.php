@extends('layouts.master')



@section('content')
    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>In this store, you can find everything you want.</p>
                    </div>
                </div>
            </div>

            <div class="row">


                @foreach ($produits as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html">
									<img style="max-height: 250px !important ; min-height :250px !important" src="{{ url($item -> imagepath) }}"alt="">
								</a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>{{ $item->name }}</span> {{ $item->price }} $ </p>
                            

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="name" value="{{ $item->name }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <input type="hidden" name="image" value="{{ $item->imagepath }}"> <!-- Si tu veux ajouter une image au panier -->
                                
                                <button type="submit" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Add to cart
                                </button>
                            </form>
                            
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>

    <!-- end product section -->
@endsection