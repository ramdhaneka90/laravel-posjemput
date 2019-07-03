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
                <tr data-id="{{$order->id}}">
                    <td>{{ $loop->iteration }}</td>
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
                    @if($order->status == "PENDING")
                      <td>Approved
                        
                        <button class="btn btn-default" id="id_order" data-toggle="modal" data-target="#modal-default" value="{{$order->id}}">Jemput</button>
                      </td>
                    @elseif($order->status == "off") 
                      <td>
                              <form action="{{ url('order', $order) }}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('PUT') }}
                              <input type="hidden" name="id" value="{{ $order->customer_id }}">
                                      <input class="btn btn-info" type="submit" value="Approve">
                              </form>   
                      </td>
                      @elseif($order->status == "JEMPUT")
                      <td>
                        Cour to Office
                        <button class="btn btn-primary">
                          Send Resi
                        </button>
                      </td>
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

<!-- Modal -->
<div class="modal fade" id="modal-default" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Courier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form-setCour">
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">  
              <label>Courier</label>
              <select name="courier" class="form-control add-cour">
                @foreach($dataCour as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
                <label>Tanggal Jemput:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tgl_jemput" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>

              
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary jemput">Set Jemput</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script type="text/javascript">
    console.log('hai guyss');

    $('#datepicker').datepicker({
      autoclose: true
    })


    // $('.timepicker').timepicker({
    //   showInput:false,
    // })

    $('#modal-default').on('show.bs.modal', function (e) {
      var id_order = $("#id_order").val();
      console.log(id_order);
      var url = "{{url('set_courier/')}}"
      console.log(url);
      $('#form-setCour').attr("action",url+"/"+id_order);
    })

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // $('.jemput').click(function (e) {
    //   const cour = $('.add-cour').val();
    //   const tgl_jemput = $('#datepicker').val();

    //     $.ajax({
    //       type:'POST',
    //       url:'/setCour',
    //       data:{
    //         courier_id:cour,
    //         waktu_jemput:tgl_jemput
    //       },
    //       success:function (data) {
    //         console.log('success');
    //       }
    //     })
    // })

  </script>
@endpush