@extends('components.main')
@section('title', 'Cart')
@section('content')
    <div class="page-wrapper cardhead">
        <div class="content pos-design p-0">
            <div class="row align-items-start pos-wrapper">
                <div class="col-md-12 col-lg-8">
                    <div class="pos-categories tabs_wrapper">
                        <h5>Categories</h5>
                        <p>Select From Below Categories</p>
                        <ul class="tabs owl-carousel pos-category">
                            <li id="all">
                                <a href="javascript:void(0);">
                                    <img src="assets/img/categories/category-01.png" alt="Categories" />
                                </a>
                                <h6><a href="javascript:void(0);">All Categories</a></h6>
                                <span>80 Items</span>
                            </li>
                            @foreach ($type as $item)
                                <li id="{{ $item->id }}">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('storage/Icon/' . $item->icon) }}" />
                                    </a>
                                    <h6><a href="javascript:void(0);">{{ $item->type }}</a></h6>
                                    <span>4 Items</span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="pos-products">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-3">Products</h5>
                            </div>
                            <div class="tabs_container">
                                <div class="tab_content active" data-tab="all">
                                    <div class="row">
                                        @foreach ($product as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3">
                                                <div class="product-info default-cover card">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="assets/img/products/pos-product-01.png" alt="Products" />
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="cat-name">
                                                        <a href="javascript:void(0);">{{ $item->category->category }}</a>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <span>{{ $item->weight }}/ gram</span>
                                                        <p>{{ number_format($item->sellingprice) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab_content" data-tab="{{ $typecincin }}">
                                    <div class="row">
                                        @foreach ($productcincin as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                                <div class="product-info default-cover card">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="assets/img/products/pos-product-05.png" alt="Products" />
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="cat-name">
                                                        <a href="javascript:void(0);">{{ $item->category->category }}</a>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <span>{{ $item->weight }}/ gram</span>
                                                        <p>{{ number_format($item->sellingprice) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab_content" data-tab="{{ $typekalung }}">
                                    <div class="row">
                                        @foreach ($productkalung as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                                <div class="product-info default-cover card">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="assets/img/products/pos-product-05.png" alt="Products" />
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="cat-name">
                                                        <a href="javascript:void(0);">{{ $item->category->category }}</a>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <span>{{ $item->weight }}/ gram</span>
                                                        <p>{{ number_format($item->sellingprice) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab_content" data-tab="{{ $typegelang }}">
                                    <div class="row">
                                        @foreach ($productgelang as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                                <div class="product-info default-cover card">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="assets/img/products/pos-product-05.png" alt="Products" />
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="cat-name">
                                                        <a href="javascript:void(0);">{{ $item->category->category }}</a>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <span>{{ $item->weight }}/ gram</span>
                                                        <p>{{ number_format($item->sellingprice) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab_content" data-tab="{{ $typeanting }}">
                                    <div class="row">
                                        @foreach ($productanting as $item)
                                            <div class="col-sm-2 col-md-6 col-lg-3 col-xl-3 pe-2">
                                                <div class="product-info default-cover card">
                                                    <a href="javascript:void(0);" class="img-bg">
                                                        <img src="assets/img/products/pos-product-05.png" alt="Products" />
                                                        <span><i data-feather="check" class="feather-16"></i></span>
                                                    </a>
                                                    <h6 class="cat-name">
                                                        <a href="javascript:void(0);">{{ $item->category->category }}</a>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <a href="javascript:void(0);">{{ $item->name }}</a>
                                                    </h6>
                                                    <div class="d-flex align-items-center justify-content-between price">
                                                        <span>{{ $item->weight }}/ gram</span>
                                                        <p>{{ number_format($item->sellingprice) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 ps-0">
                    <aside class="product-order-list">
                        <div class="head d-flex align-items-center justify-content-between w-100">
                            <div class>
                                <h5>Order List</h5>
                                <span>Transaction ID : <i class="badge badge-danger"> #{{ $idtransaksi }}</i></span>
                            </div>
                        </div>
                        <div class="customer-info block-section">
                            <h6>Customer Information</h6>
                            <div class="input-block d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <select class="select">
                                        <option>Walk in Customer</option>
                                        @foreach ($customer as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="#" class="btn btn-primary btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#create"><i data-feather="user-plus" class="feather-16"></i></a>
                            </div>
                        </div>
                        <div class="product-added block-section">
                            <div class="head-text d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center mb-0">
                                    Product Added<span class="count">{{ $count }}</span>
                                </h6>
                                <a href="javascript:void(0);" class="d-flex align-items-center text-danger"><span
                                        class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all</a>
                            </div>
                            <div class="product-wrap">
                                <div class="product-list d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal"
                                        data-bs-target="#products">
                                        <a href="javascript:void(0);" class="img-bg">
                                            <img src="assets/img/products/pos-product-17.png" alt="Products" />
                                        </a>
                                        <div class="info">
                                            <span>PT0005</span>
                                            <h6>
                                                <a href="javascript:void(0);">Red Nike Laser</a>
                                            </h6>
                                            <p>$2000</p>
                                        </div>
                                    </div>
                                    <div class="qty-item text-center">
                                        <a href="javascript:void(0);"
                                            class="dec d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i
                                                data-feather="minus-circle" class="feather-14"></i></a>
                                        <input type="text" class="form-control text-center" name="qty"
                                            value="1" />
                                        <a href="javascript:void(0);"
                                            class="inc d-flex justify-content-center align-items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i
                                                data-feather="plus-circle" class="feather-14"></i></a>
                                    </div>
                                    <div class="d-flex align-items-center action">
                                        <a class="btn-icon edit-icon me-2" href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit" class="feather-14"></i>
                                        </a>
                                        <a class="btn-icon delete-icon confirm-text" href="javascript:void(0);">
                                            <i data-feather="trash-2" class="feather-14"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-section">
                            <div class="selling-info">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="input-block">
                                            <label>Discount</label>
                                            <select class="select">
                                                <option>10%</option>
                                                <option>10%</option>
                                                <option>15%</option>
                                                <option>20%</option>
                                                <option>25%</option>
                                                <option>30%</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-total">
                                <table class="table table-responsive table-borderless">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end">$60,454</td>
                                    </tr>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end">$60,454</td>
                                    </tr>
                                    <tr>
                                        <td class="danger">Discount (10%)</td>
                                        <td class="danger text-end">$15.21</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end">$64,024.5</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="d-grid btn-block">
                            <a class="btn btn-secondary" href="javascript:void(0);">
                                Grand Total : $64,024.5
                            </a>
                        </div>
                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="btn btn-success btn-icon flex-fill"
                                data-bs-toggle="modal" data-bs-target="#payment-completed"><span
                                    class="me-1 d-flex align-items-center"><i data-feather="credit-card"
                                        class="feather-16"></i></span>Payment</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk delete-->
    <div class="modal custom-modal fade" id="modal_delete">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-warning h1 text-warning"></i>
                        <h4 class="mt-2">Perhatian !!</h4>
                        <p class="mt-3">Yakin menghapus data ini ?</p>
                        <a id="delete_link" class="btn btn-danger my-2" data-dismiss="modal">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            $('#modal_delete').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
@endsection
