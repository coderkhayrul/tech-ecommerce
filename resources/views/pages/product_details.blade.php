@extends('layouts.app')

@section('content')
    @include('layouts.menubar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/product_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/styles/product_responsive.css">

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{ asset($product->image_one) }}">
                            <img src="{{ asset($product->image_one) }}" alt="">
                        </li>
                        <li data-image="{{ asset($product->image_two) }}">
                            <img src="{{ asset($product->image_two) }}" alt="">
                        </li>
                        <li data-image="{{ asset($product->image_three) }}">
                            <img src="{{ asset($product->image_three) }}" alt="">
                        </li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset($product->image_one) }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product->category_name }} > {{ $product->subcategory_name }}
                        </div>
                        <div class="product_name">{{ $product->product_name }}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text">
                            <p>{!! Str::limit($product->product_details, 700, '...') !!}</p>
                        </div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{ route('cart.product.store', $product->id) }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="color">Color</label>
                                            <select name="product_color" class="form-control" style="width: 111.875px;">
                                                <option value="">Select Color</option>
                                                @foreach ($product_color as $color)
                                                    <option value="{{ $color }}">{{ $color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($product->product_size == null)
                                    @else
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="size">Size</label>
                                                <select name="product_size" class="form-control" style="width: 100px;">
                                                    <option value="">Select Size</option>
                                                    @foreach ($product_size as $size)
                                                        <option value="{{ $size }}">{{ $size }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input name="product_quantity" type="number" value="1"
                                                class="form-control" placeholder="Quantity" pattern="[0-9]" min="1">
                                        </div>
                                    </div>


                                </div>
                                @if ($product->discount_price == null)
                                    <div class="product_price">${{ $product->selling_price }}</div>
                                @else
                                    <div class="product_price">
                                        ${{ $product->selling_price }}<span>${{ $product->discount_price }}</span></div>
                                @endif
                                <div class="button_container">
                                    <button type="submit" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Product Datails</h3>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Product Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Video Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Product Review</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <br>{!! $product->product_details !!}
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>{{ $product->video_link }}
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><br>
                            Product
                            Reviews Show Here
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
