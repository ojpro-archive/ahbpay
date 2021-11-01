@include('components.head')

<!-- App Header -->
<div class="appHeader no-border">
    <div class="left">
        <a href="#" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        QR Code Verification
    </div>
    <div class="right">
        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogImage" id="scanDialog">
            <div class="in">
                <div>Scan</div>
            </div>
        </a>
    </div>
</div>
<!-- * App Header -->

<!-- Dialog Basic -->
<div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="">
            </div>

            <div class="modal-header">
                <h5 class="modal-title">QR Code Verification</h5>
                <div class="visible-print text-center">
                    <div class="visible-print text-center">
                        <p>Scan me to return to the original page.</p>
                    </div>
                    <p>Scan me to return to the original page.</p>
                </div>
            </div>
            <div class="modal-body">
                You can use QR code verification for two-factor authentication or protect actions.
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Dialog Basic -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="section">
        <div class="splash-page mt-5 mb-5">
            <div class="mb-3 basic w-2/3 mx-auto ">

                <div class="input-wrapper mt-4 mx-auto">
                    <label class="label" for="amount">Amount of money you want to recive </label>
                    <input type="number" class="form-control rounded-md w-full border-2 border-purple-600" id="amount"
                        autocomplete="off" placeholder="e.g 100" value="100" onkeyup="genrateQrCode()">
                </div>
                <div id="qrcode"
                    class="mx-auto w-60 h-auto mt-2 flex flex-col justify-center items-center overflow-hidden">
                </div>
            </div>
            <h2 class="mb-2">Scan the QR Code</h2>
            <p>
                Click the scan button at the top if you want to send money.
            </p>
        </div>
    </div>


    <div class="fixed-bar">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-lg btn-outline-secondary btn-block">Go Back</a>
            </div>
        </div>
    </div>
    <div class="modal fade dialogbox" id="DialogImage" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div id="qrscanner" width="600px" class="!flex !flex-col !justify-center">

                </div>

                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" id="closeScanner" data-bs-dismiss="modal">CANCEL</a>
                        <a href="#" class="btn btn-text-primary" id="doneScanner" data-bs-dismiss="modal">DONE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="{{ asset('js/qrcode.min.js') }}"></script>


<script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
<script>
    let amount = document.getElementById('amount');



    var qrcode = new QRCode("qrcode", {
        text: `{{ config('app.url') }}/send/{{ Auth::user()->uuid }}/${amount.value}`,
        width: 400,
        height: 400,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });

    function genrateQrCode() {
        qrcode.clear()
        qrcode.makeCode(`{{ config('app.url') }}/send/{{ Auth::user()->uuid }}/${amount.value}`);
    }

    // qrcode scanner
    function onScanSuccess(decodedText) {
        // handle the scanned code as you like, for example:
        window.location = decodedText
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "qrscanner", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

</script>

@include('components.foot')
