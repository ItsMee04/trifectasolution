@extends('components.main')
@section('title', 'Employee')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Employee List</h4>
                        <h6>Manage your employee</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                                class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="page-btn">
                    <a class="modal-effect btn btn-added" data-bs-effect="effect-sign" data-bs-toggle="modal"
                        href="#modaldemo8"><i data-feather="plus-circle" class="me-2"></i>Add Employee</a>
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
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Profession</th>
                                    <th>Avatar</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listemployee as $item)
                                    <tr>
                                        <td>{{ $item->name }} </td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->profession->profession }}</td>
                                        <td>
                                            <div class="userimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="{{ asset('storage/avatar/' . $item->avatar) }}"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">{{ $item->name }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modaldemo8">
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
                        <div class="mb-0">
                            <div class="status-toggle modal-status d-flex justify-content-between align-items-center">
                                <span class="status-label">Status</span>
                                <input type="checkbox" id="user2" class="check" name="status" checked>
                                <label for="user2" class="checktoggle"></label>
                            </div>
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
@endsection
