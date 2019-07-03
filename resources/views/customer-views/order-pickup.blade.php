@extends('layouts.master-costumer')
@section('header')
  @include('customer-views.header')
@endsection

@section('content')

        <br>
        <br>
        <br>


        <div class="bungkus" style="margin:0 70px;">
            <div class="row mt-4">
                <div class="col-lg-12">

                    <a href="/home"><i class="fas fa-long-arrow-alt-left fa-2x" style="color: black;"></i></a>
                    <br>
                    <br>

                    <div class="card">
                        <div class="card-header">Order</div>

                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div style="padding: 20px;">
                                <form id="form_order">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Nama Penerima</label>
                                            <input type="text" class="form-control" name="namaPenerima" placeholder="Nama Penerima">
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="barang" placeholder="Nama Barang">
                                            <br>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Kategori Barang</label>
                                            <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                                            <br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Jumlah Barang</label>
                                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang"><br>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Berat Barang</label>
                                            <input type="number" class="form-control" name="berat" placeholder="Berat Barang"><br>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="radio" name="almPck" value="1" checked=""> 
                                            <select class="form-control" id="alamatLamaPck" name="alamatPck">
                                                <option selected="" value="">Pilih alamat pickup</option>
                                                @foreach($add2s as $value2)
                                                    <option>{{ $value2 }}</option>
                                                @endforeach
                                            </select><br>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <label>Alamat Pengiriman</label>
                                            <input style="position:absolute;left:0;top:40px;bottom:0;" type="radio" name="alm" value="1" checked="">


                                            <select class="form-control" id="alamatLama" name="alamat">
                                                <option selected="" value="">Pilih alamat pengiriman</option>
                                                <option>Jl. Bebas No.2</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="radio" name="alm" value="2" style="position:absolute;left:0;top:20px;bottom:0;">
                                            <textarea id="alamatBaru" style="margin-top:10px;" name="alamat" class="form-control" placeholder="Tambah alamat pengiriman baru"></textarea><br>
                                        </div>
                                    </div>

                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </form>
                                <button id="tambah_form" class="btn btn-info"> + Tambah pengiriman</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Order List
                        </div>

                        <div class="card-body">
                            <form action="{{ route('order') }}" method="POST">
                                @csrf
                                		<div class="col-lg-6">
                                			<button type="submit" disabled="" class="mt-4"  id="kirim">Mulai pengiriman</button><br>
                                		</div>
                                <table class="table table-striped" id="tabel_order" style="table-layout:fixed;">
                                    <tr style="overflow:auto;">
                                        <td>No</td>
                                        <td>Nama Pengirim</td>
                                        <td>Nama Barang</td>
                                        <td>Kategori</td>
                                        <td>Jumlah Barang</td>
                                        <td>Berat Barang</td>
                                        <td>Alamat Pengiriman</td>
                                        <td>Alamat PickUp</td>
                                        <td>Aksi</td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
@endsection