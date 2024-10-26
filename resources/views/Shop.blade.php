@extends('layouts.master2', ['title' => 'Shop'])

@section('contente')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
    
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="{{ $cat == null ? 'active' : '' }}"><a href="/Shop">All</a></li>
                            @foreach ($items as $item)
                                <li class="{{ $cat && $cat->id == $item->id ? 'active' : '' }}"><a
                                        href="/Shop/{{ $item->id }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    
            <div class="row product-lists">
                @foreach ($produits as $item)
                    <div class="col-lg-4 col-md-6 text-center strawberry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/Shop/{{ $item->id }}"><img src="{{asset($item->imagepath) }}"
                                        style="max-height: 250px ; min-height : 250px !important" alt=""></a>
                            </div>
    
    
                            <h3>{{ $item->name }}</h3>
                            <p class="product-price"><span>Per Qte</span> {{ $item->price }}$ </p>
                            <form action="{{route('cart.add')}}" method="POST" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $item -> id}}">
                                <input type="hidden" name="name" value="{{ $item -> name}}">
                                <input type="hidden" name="price" value="{{ $item -> price}}">
                                
                                <button  class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to cart</button>
                            </form>
    
                        </div>
                    </div>
                @endforeach
    
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="pagination-wrap">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a class="active" href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- end products -->

        <!-- logo carousel -->
        <div class="logo-carousel-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-carousel-inner">
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/1.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/2.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/3.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/4.png" alt="">
                            </div>
                            <div class="single-logo-item">
                                <img src="assets/img/company-logos/5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end logo carousel -->
    @endsection
