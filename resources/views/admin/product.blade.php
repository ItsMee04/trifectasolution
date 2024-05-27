@extends('components.main')
@section('title', 'Product')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Product List</h4>
                        <h6>Manage your products</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" onClick="window.location.href=window.location.href" data-bs-placement="top"
                            title="Refresh"><i data-feather="rotate-ccw" class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn">
                    <a class="modal-effect btn btn-added" data-bs-effect="effect-sign" data-bs-toggle="modal"
                        href="#modaladd"><i data-feather="plus-circle" class="me-2"></i>Add Products</a>
                </div>
            </div>

            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive product-list">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        No.
                                    </th>
                                    <th>Product</th>
                                    <th>Code Product</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="{{ asset('storage/product/' . $item->image) }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">{{ $item->name }} </a>
                                        </div>
                                    </td>
                                    <td>{{ $item->codeproduct }} </td>
                                    <td>{{ $item->type->type }}</td>
                                    <td>{{ $item->category->category }}</td>
                                    <td>{{ $item->pricesell }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon  p-2" href="product-details.html">
                                                <i data-feather="eye" class="feather-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/stock-img-06.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Bold V3.2</a>
                                        </div>
                                    </td>
                                    <td>PT002</td>
                                    <td>Electronics</td>
                                    <td>Bolt</td>
                                    <td>$1600.00</td>
                                    <td>Pc</td>
                                    <td>140</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-13.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Kenneth</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/stock-img-02.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Nike Jordan</a>
                                        </div>
                                    </td>
                                    <td>PT003</td>
                                    <td>Shoe</td>
                                    <td>Nike</td>
                                    <td>$6000.00</td>
                                    <td>Pc</td>
                                    <td>780</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-11.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Gooch</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/stock-img-03.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Apple Series 5 Watch</a>
                                        </div>
                                    </td>
                                    <td>PT004</td>
                                    <td>Electronics</td>
                                    <td>Apple</td>
                                    <td>$25000.00</td>
                                    <td>Pc</td>
                                    <td>450</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-03.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Nathan</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/stock-img-04.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Amazon Echo Dot</a>
                                        </div>
                                    </td>
                                    <td>PT005</td>
                                    <td>Speaker</td>
                                    <td>Amazon</td>
                                    <td>$1600.00</td>
                                    <td>Pc</td>
                                    <td>477</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-02.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Alice</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/stock-img-05.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Lobar Handy</a>
                                        </div>
                                    </td>
                                    <td>PT006</td>
                                    <td>Furnitures</td>
                                    <td>Woodmart</td>
                                    <td>$4521.00</td>
                                    <td>Kg</td>
                                    <td>145</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-05.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Robb</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/expire-product-01.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Red Premium Handy</a>
                                        </div>
                                    </td>
                                    <td>PT007</td>
                                    <td>Bags</td>
                                    <td>Versace</td>
                                    <td>$2024.00</td>
                                    <td>Kg</td>
                                    <td>747</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-08.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Steven</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/expire-product-02.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Iphone 14 Pro</a>
                                        </div>
                                    </td>
                                    <td>PT008</td>
                                    <td>Phone</td>
                                    <td>Iphone</td>
                                    <td>$1698.00</td>
                                    <td>Pc</td>
                                    <td>897</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-04.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Gravely</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/expire-product-03.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Black Slim 200</a>
                                        </div>
                                    </td>
                                    <td>PT009</td>
                                    <td>Chairs</td>
                                    <td>Bently</td>
                                    <td>$6794.00</td>
                                    <td>Pc</td>
                                    <td>741</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-01.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Kevin</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="productimgname">
                                            <a href="javascript:void(0);" class="product-img stock-img">
                                                <img src="assets/img/products/expire-product-04.png" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Woodcraft Sandal</a>
                                        </div>
                                    </td>
                                    <td>PT010</td>
                                    <td>Bags</td>
                                    <td>Woodcraft</td>
                                    <td>$4547.00</td>
                                    <td>Kg</td>
                                    <td>148</td>
                                    <td>
                                        <div class="userimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="assets/img/users/user-10.jpg" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Grillo</a>
                                        </div>
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 edit-icon p-2" href="product-details.html">
                                                <i data-feather="eye" class="action-eye"></i>
                                            </a>
                                            <a class="me-2 p-2" href="edit-product.html">
                                                <i data-feather="edit" class="feather-edit"></i>
                                            </a>
                                            <a class="confirm-text p-2" href="javascript:void(0);">
                                                <i data-feather="trash-2" class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="modal fade" id="modaladd">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title">Create Employee</h4><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <form action="employee" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profession</label>
                            <select class="select" name="profession">
                                <option>Choose Profession</option>
                                @foreach ($profession as $itemprofession)
                                    <option value="{{ $itemprofession->id }}">{{ $itemprofession->profession }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Signature</label>
                            <div class="col-md-12">
                                <input class="form-control" name="signature" type="file">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <div class="col-md-12">
                                <input class="form-control" name="avatar" type="file">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="select" name="status">
                                <option>Choose Status</option>
                                <option value="1"> Active</option>
                                <option value="2"> Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Modal Popup untuk delete-->
    <div class="modal custom-modal fade" id="modal_delete">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-warning h1 text-warning"></i>
                        <h4 class="mt-2">Perhatian !!</h4>
                        <p class="mt-3">Yakin menghapus data ini ?</p>
                        <a id="delete_link" class="btn btn-warning my-2" data-dismiss="modal">Delete</a>
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
