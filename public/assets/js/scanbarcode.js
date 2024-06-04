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
                url: "scanbarcodevalidasi",
                type: "POST",
                data: {
                    _methode: "POST",
                    _token: CSRF_TOKEN,
                    qr_code: id,
                },
                success: function (data) {
                    if (data) {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                        });

                        toastr.success("Data Berhasil Ditemukan");
                        window.location = "product-details/" + id;
                    } else {
                        alert("gagal");
                    }
                },
            });
        })
        .catch((error) => {
            alert("something wrong");
        });
}

function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    // console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    {
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
