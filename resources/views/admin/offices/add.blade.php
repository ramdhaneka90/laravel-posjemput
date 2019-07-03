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
          <h3 class="box-title">Add Offices</h3>

          
        </div>

        <div class="box-body">
        <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Code Unit</label>
                  <input type="text" class="form-control" placeholder="Enter Code Unit">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" class="form-control">

                  </textarea>
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