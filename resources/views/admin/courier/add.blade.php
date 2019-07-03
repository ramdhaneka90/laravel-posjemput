@extends('layouts.master-operator')

@section('header','Couriers')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i>Couriers</a></li>
      </ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Courier</h3>

          
        </div>

        <div class="box-body">
        <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label>Max Order</label>
                  <input type="number" min="1" class="form-control"  placeholder="Max Order">
                </div>

                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Active</option>
                        <option value="">In Active</option>
                        <option value="">On Duty</option>
                    </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/courier" class="btn btn-info">Back</a>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>
@endsection