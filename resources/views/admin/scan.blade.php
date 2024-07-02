@extends('components.main')
@section('title', 'Category Product')
@section('content')
    <div class="page-wrapper cardhead">
        <div class="content">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">SCAN PRODUCT BARCODES</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/product">Product</a></li>
                            <li class="breadcrumb-item active">Scan Barcode</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- /product list -->
            <section class="comp-section comp-cards">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card flex-fill bg-white">
                            <div id="reader"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                    </div>
                </div>
            </section>
            <!-- /product list -->
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:

            // alert(decodedText);
            $("#result").val(decodedText);
            let id = decodedText;
            html5QrcodeScanner
                .clear()
                .then((_) => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
                    $.ajax({
                        url: "scanqr",
                        type: "POST",
                        data: {
                            _methode: "POST",
                            _token: CSRF_TOKEN,
                            qr_code: id,
                        },
                        success: function(data) {
                            if (data) {
                                const successtoastExample = document.getElementById('successToastScan')
                                const toast = new bootstrap.Toast(successtoastExample)
                                toast.show()
                                window.location = "products/" + id;
                            } else {
                                const dangertoastExample = document.getElementById('dangerToastScan')
                                const toast = new bootstrap.Toast(dangertoastExample)
                                toast.show()
                            }
                        },
                    });
                })
                .catch((error) => {
                    const dangertoastExample = document.getElementById('dangerToastScan')
                    const toast = new bootstrap.Toast(dangertoastExample)
                    toast.show()
                });
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250,
                },
            },
            /* verbose= */
            false
        );
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
