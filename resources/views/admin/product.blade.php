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
                                @foreach ($product as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="productimgname">
                                                @if ($item->image != null)
                                                    <a href="javascript:void(0);" class="product-img stock-img">
                                                        <img src="{{ asset('storage/imageProduct/' . $item->image) }}"
                                                            alt="product">
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);" class="product-img stock-img">
                                                        <img src="{{ asset('assets') }}/img/notfound/notfound.png"
                                                            alt="product">
                                                    </a>
                                                @endif
                                                <a href="javascript:void(0);"><strong>{{ $item->name }}</strong>
                                                </a>
                                            </div>
                                        </td>
                                        <td><a href="products/{{ $item->id }}"><strong>{{ $item->codeproduct }}
                                                </strong></a></td>
                                        <td>{{ $item->type->type }}</td>
                                        <td>{{ $item->category->category }}</td>
                                        <td>{{ 'Rp.' . ' ' . number_format($item->sellingprice, 2) }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 edit-icon  p-2" href="products/{{ $item->codeproduct }}">
                                                    <i data-feather="eye" class="feather-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" data-bs-effect="effect-sign" data-bs-toggle="modal"
                                                    href="#modaledit{{ $item->id }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="me-2 p-2"
                                                    onclick="confirm_modal('delete-products/{{ $item->id }}');"
                                                    data-bs-toggle="modal" data-bs-target="#modal_delete">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit -->
                                    <div class="modal fade" id="modaledit{{ $item->id }}">
                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Create Product</h4><button aria-label="Close"
                                                        class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="products/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body text-start">
                                                        <div class="mb-3">
                                                            <label class="form-label">Code Product</label>
                                                            <input type="text" name="codeproduct" class="form-control"
                                                                value="{{ $item->codeproduct }}" readonly>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Name</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $item->name }}" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Selling Price</label>
                                                                <input type="text" name="sellingprice"
                                                                    value="{{ $item->sellingprice }}"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Type</label>
                                                                <select class="select" name="type">
                                                                    <option>Choose Type</option>
                                                                    @foreach ($type as $itemtype)
                                                                        <option value="{{ $itemtype->id }}"
                                                                            @if ($item->type_id == $itemtype->id) selected="selected" @endif>
                                                                            {{ $itemtype->type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Category</label>
                                                                <select class="select" name="category">
                                                                    <option>Choose Category</option>
                                                                    @foreach ($category as $itemcategory)
                                                                        <option value="{{ $itemcategory->id }}"
                                                                            @if ($item->category_id == $itemcategory->id) selected="selected" @endif>
                                                                            {{ $itemcategory->category }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Weight</label>
                                                                <input type="text" name="weight"
                                                                    value="{{ $item->weight }}" class="form-control">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label">Carat</label>
                                                                <input type="text" name="carat"
                                                                    value="{{ $item->carat }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" name="description">{{ $item->description }}</textarea>
                                                        </div>
                                                        <div class="new-employee-field">
                                                            <label class="form-label">Image</label>
                                                            <div class="profile-pic-upload">
                                                                <div class="profile-pic people-profile-pic">
                                                                    @if ($item->image != null)
                                                                        <img src="{{ asset('storage/imageProduct/' . $item->image) }}"
                                                                            alt="avatar">
                                                                    @else
                                                                        <img src="{{ asset('assets') }}/img/notfound/not found.png"
                                                                            alt="avatar">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="col-md-12">
                                                                <input class="form-control" name="image"
                                                                    type="file">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="select" name="status">
                                                                <option>Choose Status</option>
                                                                <option value="1"
                                                                    @if ($item->status == 1) selected="selected" @endif>
                                                                    Active</option>
                                                                <option value="2"
                                                                    @if ($item->status == 2) selected="selected" @endif>
                                                                    Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-cancel"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modaladd">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h4 class="modal-title">Create Product</h4><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <form action="products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body text-start">
                        <div class="mb-3">
                            <label class="form-label">Code Product</label>
                            <input type="text" name="codeproduct" class="form-control" value="{{ $codeproduct }}"
                                readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Selling Price</label>
                                <input type="text" name="sellingprice" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type</label>
                                <select class="select" name="type">
                                    <option>Choose Type</option>
                                    @foreach ($type as $itemtype)
                                        <option value="{{ $itemtype->id }}">{{ $itemtype->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="select" name="category">
                                    <option>Choose Category</option>
                                    @foreach ($category as $itemcategory)
                                        <option value="{{ $itemcategory->id }}">{{ $itemcategory->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Weight</label>
                                <input type="text" name="weight" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Carat</label>
                                <input type="text" name="carat" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <div class="col-md-12">
                                <input class="form-control" name="image" type="file">
                            </div>
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
