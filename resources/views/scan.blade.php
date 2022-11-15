<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/*" href="{{ asset('images/fav/favicon.png') }}" id="favicon" />
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/sms.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="{{ asset('/js/html5-qrcode.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/html5-qrcode@2.0.9/dist"></script> --}}
    @laravelPWA
</head>

  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <br>
        <br>
        <br>
        <div class="text-center mb-2">
            {{-- <a href="/sim3/" class=""><img src="{{ url('uploads/logo/QOq58WTUt4IObdfQFdMOMRekO990B1bXzekzHaX0.png') }}" alt=""></a> --}}
        </div>
        <form class="card card-md" action="." method="get">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Scan QR</h2>
            <div class="mb-3">
              <label class="form-label">Date</label>
              <input type="text" class="form-control" value="{{  \Carbon\Carbon::now()->format('d M Y') }}" readonly>
            </div>
            <div class="mb-3">
              <div id="qr-reader" style="width: 370px"></div>
            </div>
            <div class="mb-3">
              <label class="form-label">Type</label>
              <select name="type" id="type" class="form-control">
                <option value="IN">Masuk</option>
                <option value="OUT">Pulang</option>
              </select>
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select name="category" id="category" class="form-control">
                <option value="students">Murid</option>
                <option value="teacher">Guru</option>
              </select>
            <div class="form-footer">
              <a href="{{ url('/') }}" class="btn btn-primary w-100">to Dashboard</a>
            </div>
              {{-- <input type="email" class="form-control" placeholder="Enter email"> --}}
            </div>

          </div>
        </form>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    {{-- <script src="./dist/js/tabler.min.js"></script>
    <script src="./dist/js/demo.min.js"></script> --}}
  </body>
  <script>
    // function onScanSuccess(decodedText, decodedResult) {
    // console.log(`Code scanned = ${decodedText}`, decodedResult);
    // }
    // var html5QrcodeScanner = new Html5QrcodeScanner(
    //     "qr-reader", { fps: 10, qrbox: 200 });
    // html5QrcodeScanner.render(onScanSuccess);
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 1, qrbox: 150 });

    function onScanSuccess(decodedText, decodedResult) {
        console.log(decodedText, decodedResult);
        var type = $('[name="type"]').val();
        var category = $('[name="category"]').val();
        $.ajax({
        method:'POST',
        url: '/scan',
        data : { roll_no : decodedResult['decodedText'], type : type, category : category },
        success:function (data) {
            if(data == true){
                alert('Berhasil!');
            } else {
                alert('Sudah Scan!');
            }
        }
        });
    }


    html5QrcodeScanner.render(onScanSuccess);
  </script>
</html>
