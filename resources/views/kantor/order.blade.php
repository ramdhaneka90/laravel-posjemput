<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <table border="1">

        <tr>
            <td>No</td>
            <td>Barang</td>
            <td>Kateogri</td>
            <td>Berat</td>
            <td>Status</td>
            <td>Jumlah</td>
            <td>Penerima</td>
            <td>Alamat Pengiriman</td>
            <td>Alamat Pickup</td>
            <td>Action</td>
        </tr>
        <tr>
        @foreach($orders as $key => $order)
            <td>{{ $key+=1 }}</td>
            <td>{{ $order->name_order }}</td>
            <td>{{ $order->category }}</td>
            <td>{{ $order->weight }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->name_receiver }}</td>
            <td>{{ $order->address_receiver }}</td>
            <td>1</td>
            @if($order->status == "ON")
            <td>Approved</td>
            @else 
            <td>
                    <form action="{{ url('order', $order) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="submit" value="Approve">
                    </form>   
            </td>
            @endif
        </tr>
        
        @endforeach
    </table>

</body>
</html>