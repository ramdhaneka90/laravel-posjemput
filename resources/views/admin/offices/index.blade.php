@extends('layouts.master-operator')

@section('header','Offices')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i>Offices</a></li>
      </ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List Offices</h3>

          
        </div>

        <div class="box-body">
          
        <table class="table table-bordered" id="table-office">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Code Unit</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="office-list">
                  @foreach($office as $value)
                <tr data-id="{{$value->id}}" id="data_office_{{$value->id}}" class="tes">
                  <td class="nomer">{{$loop->iteration}}</td>
                  <td class="kode">{{$value->code_unit}}</td>
                  <td class="imah">{{$value->address}}</td>
                  <td>
                      <button class="btn btn-info ubah" data-id="{{$value->id}}"> Update</button>
                      <button class="btn btn-danger hapus" data-id="{{$value->id}}">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$office->links()}}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <form role="form" id="form-office">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Code Unit</label>
                  <input type="text" name="code_unit" class="form-control" placeholder="Enter Code Unit">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" class="form-control"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

            </form>
              <div class="box-footer">
                <button class="btn btn-primary create">Submit</button>
                <button class="btn btn-info">Reset</button>
              </div>
        </div>
        <!-- /.box-footer-->
      </div>
@endsection

@push('script')
  <script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When user click add user button */
    console.log();
    $('.create').click(function () {
        const entryOffice = $('#form-office').serializeArray();
        $.ajax({
          type:'POST',
          url:"{{route('office.store')}}",
          data: entryOffice,
          success:function (param) {
            console.log(param.data.code_unit);
            var no = parseInt($('.nomer').last().text())+1;
            $('#table-office').append("<tr data-id='"+param.data.id+"'><td>" + no + "</td>"+
              "<td>" + param.data.code_unit + "</td>"+
              "<td>"+ param.data.address +"</td>"+
              "<td><button class='btn btn-info ubah' data-id='"+param.data.id+"'>Update</button> "+
              "<button class='btn btn-danger hapus' data-id='"+param.data.id+"'>Delete</button></td>"+
              "</tr>");
          }
        })
    });
 
   /* When click edit user */
    $(document).on('click', '.ubah', function () {
      var office_id = $(this).data('id');
      var index = $('#data_office_'+office_id).index();
      //console.log(index);
      var address = $('.imah').eq(index).html();
      var kode = $('.kode').eq(index).html();
      $('input[name=code_unit]').val(kode);
      $('textarea').val(address);
      // $.get('office/' + user_id +'/edit', function (data) {
         
      // })
   });
   //delete user login
    $(document).on('click','.hapus', function () {
        var office_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
        $.ajax({
            type: "DELETE",
            url: "{{ url('office')}}"+'/'+office_id,
            success: function (data) {
                $("#data_office_" + office_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
      }
    });   
  });
 
 
   
  
</script>
@endpush