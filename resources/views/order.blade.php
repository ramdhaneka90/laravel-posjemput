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
          <h3 class="box-title">Order Entry</h3>
        </div>
        <div class="box-body">
        	<form action="{{ url('order/store') }}" method="POST">
				@csrf
				<button style="margin-bottom: 5px;" type="submit" disabled="" id="kirim">Mulai pengiriman</button>
				<table class="table table-bordered" id="tabel_order">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Penerima</th>
							<th>Nama Barang</th>
							<th>Kategori Barang</th>
							<th>Jumlah Barang</th>
							<th>Berat Barang</th>
							<th>Alamat Penerima</th>
							<th>Alamat Pickup</th>
							<th>Aksi</th>
						</tr>
					</thead>
				</table>
			</form>	
        </div>
	</div>
	<div class="box">
		<div class="box-header with-border">
          <h3 class="box-title">Order Form</h3>
        </div>
        <div class="box-body">
			<form id="form_order">
				<label>Nama Penerima</label>
				<input class="form-control" type="text" name="namaPenerima" placeholder="Nama Pengirim"><br>
				<label>Nama Barang</label>
				<input class="form-control" type="text" name="barang" placeholder="Nama Barang"><br>
				<label>Jumlah Barang</label>
				<input class="form-control" type="number" min="1" name="jumlah" placeholder="Jumlah Barang"><br>
				<label>Kategori Barang</label>
				<input class="form-control" type="text" name="kategori" placeholder="Kategori Barang"><br>
				<label>Berat Barang</label>
				<input class="form-control" type="number" min="1" name="berat" placeholder="Berat Barang"><br>

				<label>Alamat Penerima</label><br>
				<input type="radio" name="alm" value="1" checked="">	
				<select class="form-control" id="alamatLama" name="alamat">
					<option selected="" value="">Pilih alamat penerima</option>
					@foreach($adds as $value1)
						@if($value1 != null)
							<option>{{ $value1 }}</option>
						@endif
					@endforeach
				</select><br>
				<input type="radio" name="alm" value="2">
				<textarea class="form-control" id="alamatBaru" name="alamat" placeholder="Tambah alamat penerima baru"></textarea><br>
				
				<label>Alamat Pickup</label><br>
				<input type="radio" name="almPck" value="1" checked="">	
				<select class="form-control" id="alamatLamaPck" name="alamatPck">
					<option selected="" value="">Pilih alamat pickup</option>
					@foreach($add2s as $value2)
						<option>{{ $value2 }}</option>
					@endforeach
				</select><br>
				<input type="radio" name="almPck" value="2">
				<textarea class="form-control" id="alamatBaruPck" name="alamatPck" placeholder="Tambah alamat pickup baru"></textarea><br>
				<button id="rst" class="form-control" type="reset">Resffdsdsfdsfdsfsfdsfsfdsfeat</button>
			</form>
			<button class="form-control" id="tambah_form"> + Tambah pengairiman</button>
        </div>

	</div>
@endsection