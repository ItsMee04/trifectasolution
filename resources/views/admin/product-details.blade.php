@extends('components.main')
@section('title', 'Product')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Details</h4>
                    <h6>Full details of a product</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="bar-code-view">
                                {!! DNS2D::getBarcodeSVG($product->codeproduct, 'QRCODE') !!}
                                <a class="printimg">
                                    <img src="{{ asset('assets') }}/img/icons/printer.svg" alt="print">
                                </a>
                            </div>
                            <div class="productdetails">
                                <ul class="product-bar">
                                    <li>
                                        <h4>Product</h4>
                                        <h6>{{ $product->name }} </h6>
                                    </li>
                                    <li>
                                        <h4>Selling Price</h4>
                                        <h6>{{ 'Rp.' . ' ' . number_format($product->sellingprice, 2) }}</h6>
                                    </li>
                                    <li>
                                        <h4>Description</h4>
                                        <h6>{{ $product->description }}</h6>
                                    </li>
                                    <li>
                                        <h4>Type</h4>
                                        <h6>{{ $product->type->type }}</h6>
                                    </li>
                                    <li>
                                        <h4>Category</h4>
                                        <h6>{{ $product->category->category }}</h6>
                                    </li>
                                    <li>
                                        <h4>Weight</h4>
                                        <h6>{{ $product->weight }}</h6>
                                    </li>
                                    <li>
                                        <h4>Carat</h4>
                                        <h6>{{ $product->carat }}</h6>
                                    </li>
                                    <li>
                                        <h4>Status</h4>
                                        <h6>
                                            @if ($product->status == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="slider-product-details">
                                <div class="owl-carousel owl-theme product-slide">
                                    <div class="slider-product">
                                        @if ($product->image != null)
                                            <img src="{{ asset('storage/imageProduct/' . $product->image) }}"
                                                alt="img">
                                        @else
                                            <img src="{{ asset('assets') }}/img/notfound/not found.png" alt="product">
                                        @endif
                                        <h4>{{ $product->name }}</h4>
                                        <h6>{{ number_format($size) }}kb</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
