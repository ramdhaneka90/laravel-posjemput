@extends('layouts.master-operator')

@section('header','Order')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Order</a></li>
      </ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Barang</th>
                  <th>Kateogri</th>
                  <th>Berat</th>
                  <th>Status</th>
                  <th>Jumlah</th>
                  <th>Penerima</th>
                  <th>Alamat Pengiriman</th>
                  <th>Alamat Pickup</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $key => $order)
                  <tr>
                    <td>{{ $key+=1 }}</td>
                    <td>{{ $order->name_order }}</td>
                    <td>{{ $order->category }}</td>
                    <td>{{ $order->weight }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->name_receiver }}</td>
                    <td>{{ $order->address_receiver }}</td>
                    @if(!is_null($order->customer()->first()->customerAddress()->first()))
                        <td>{{ $order->customer()->first()->customerAddress()->first()->address }}</td>
                    @else
                      <td>-</td>
                    @endif
                    @if($order->status == 'on')
                      <td><p style="color:green;">Approved</p></td>
                    @else
                      <td><p style="color:red;">Not yet approved</p></td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <center>
          {{ $orders->links() }}
          </center>
        </div>
        <!-- /.box-footer-->
      </div>
@endsection