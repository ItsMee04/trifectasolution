@extends('components.main')
@section('title', 'Employee')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Employees</h4>
                        <h6>Manage your employees</h6>
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
                    <a href="add-employee.html" class="btn btn-added"><i data-feather="plus-circle" class="me-2"></i>Add
                        New Employee</a>
                </div>
            </div>

            <div class="total-employees">
                <h6><i data-feather="users" class="feather-user"></i>Total Employees <span>21</span>
                </h6>
            </div>

            <div class="employee-grid-widget">
                <div class="row">
                    @foreach ($listemployee as $item)
                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6">
                            <div class="employee-grid-profile">
                                <div class="profile-head">
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                    <div class="profile-head-action">
                                        <span
                                            class="badge badge-linesuccess text-center w-auto me-1">{{ $item->status }}</span>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i data-feather="more-vertical"
                                                    class="feather-user"></i></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="edit-employee.html" class="dropdown-item"><i
                                                            data-feather="edit" class="info-img"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item confirm-text mb-0"><i
                                                            data-feather="trash-2" class="info-img"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <div class="profile-pic active-profile">
                                        <img src="{{ asset('assets') }}/img/users/user-01.jpg" alt>
                                    </div>
                                    <h5>EMP ID : POS001</h5>
                                    <h4>Mitchum Daniel</h4>
                                    <span>Designer</span>
                                </div>
                                <ul class="department">
                                    <li>
                                        Joined
                                        <span>23 Jul 2023</span>
                                    </li>
                                    <li>
                                        Department
                                        <span>UI/UX</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
