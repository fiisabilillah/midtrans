<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="{{config('midtrans.snap_url')}}" data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

</head>
<body>

    <div class="container" id="snap-container">
        <h1 class="my-3">Toko</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{asset('assets/img/a.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td> : {{$order->name}}</td>
                    </tr>
                    <tr>
                        <td>No hp</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td> : {{$order->address}}</td>
                    </tr>
                    <tr>
                        <td>qty</td>
                        <td> : {{$order->qty}}</td>
                    </tr>
                    <tr>
                        <td>total</td>
                        <td> : {{$order->total_price}}</td>
                    </tr>
                </table>
                <button class="btn btn-primary" id="pay-button">Bayar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // Ensure that snapToken is available and passed correctly
    var snapToken = '{{$snapToken}}';  // Pastikan snapToken di-passing dengan benar dari server-side
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup
        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                alert("waiting for your payment!");
                console.log(result);
            },
            onError: function(result) {
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                alert('you closed the popup without finishing the payment');
            }
        });
    });
  </script>
</body>

</html>
