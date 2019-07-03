@extends('layouts.master-operator')

@section('header','Pembayaran Tagihan')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					Verifikasi Pembayaran
				</div>

				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Costumer</th>
								<th>Nominal</th>
								<th>Bukti Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>

						<tbody>
							@if($data=='[]')
								<tr>
									<td colspan="4"><h5 class="text-center">Data Tidak Ada</h5></td>
								</tr>
							@else

							@foreach($data as $value)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->nominal}}</td>
								<td><a href="{{asset('img/bukti-topup/'.$value->bukti_bayar)}}" target="_blank">Lihat File</a></td>
								<td>
									<form method="POST" action="{{route('verifikasiBayar',$value->id)}}">
										@csrf
										@method('PUT')
										<input type="submit" class="btn btn-success" value="Lunas">
									</form>
									<a href="" class="btn btn-warning">Kurang</a>
								</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection