<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Trifecta Solution</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/trifecta.ico">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toatr.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body class="account-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper login-new">
                <div class="container">

                    @if ($errors->any())
                        <!-- Alert -->
                        <div class="alert alert-danger border border-danger mb-0 p-3">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <i class="feather-alert-octagon flex-shrink-0"></i>
                                </div>
                                <div class="text-danger w-100">
                                    <div class="fw-semibold d-flex justify-content-between">
                                        <strong>Peringatan !</strong>
                                        <button type="button" class="btn-close p-0" data-bs-dismiss="alert"
                                            aria-label="Close"><i class="fas fa-xmark"></i></button>
                                    </div>
                                    <div class="fs-12 op-8 mb-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="login-content user-login">
                        <div class="login-logo">
                            <img src="{{ asset('assets') }}/img/logo.png" alt="img">
                        </div>
                        <form action="login" method="POST">
                            @csrf
                            <div class="login-userset">
                                <div class="login-userheading">
                                    <h3>Sign In</h3>
                                    <h4>Access the Trifecta panel using your <strong>Username</strong> and
                                        <strong>passcode.</strong>
                                    </h4>
                                </div>
                                <div class="form-login">
                                    <label class="form-label">Username</label>
                                    <div class="form-addons">
                                        <input type="text" class="form-control" name="username">
                                        <img src="{{ asset('assets') }}/img/icons/mail.svg" alt="img">
                                    </div>
                                </div>
                                <div class="form-login">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="pass-input" name="password">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                                <div class="form-login authentication-check">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <label class="checkboxs ps-4 mb-0 pb-0 line-height-1">
                                                    <input type="checkbox">
                                                    <span class="checkmarks"></span>Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="forgot-password-3.html"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-login">
                                    <button class="btn btn-login" type="submit">Sign In</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="my-4 d-flex justify-content-center align-items-center copyright-text">
                        <p>Copyright &copy; 2023 Trifecta Solution. All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customizer-links" id="setdata">
        <ul class="sticky-sidebar">
            <li class="sidebar-icons">
                <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="Theme">
                    <i data-feather="settings" class="feather-five"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast colored-toast bg-success-transparent" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header bg-success text-fixed-white">
                <strong class="me-auto">Peringatan !</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success-message') }}
            </div>
        </div>
        <div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header bg-danger text-fixed-white">
                <strong class="me-auto">Peringatan !</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('errors-message') }}
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/feather.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.js" type="text/javascript"></script>

    <script src="{{ asset('assets') }}/js/theme-script.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/script.js" type="text/javascript"></script>
    @if (session('success-message'))
        <script>
            const successtoastExample = document.getElementById('successToast')
            const toast = new bootstrap.Toast(successtoastExample)
            toast.show()
        </script>
    @elseif(session('errors-message'))
        <script>
            const dangertoastExample = document.getElementById('dangerToast')
            const toast = new bootstrap.Toast(dangertoastExample)
            toast.show()
        </script>
    @endif
</body>

</html>
