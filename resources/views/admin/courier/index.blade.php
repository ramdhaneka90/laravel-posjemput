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
          <h3 class="box-title">List Courier</h3>

          
        </div>

        <div class="box-body">
          
        <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Name</th>
                  <th>Max Order</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1.</td>
                  <td>Nasrulloh</td>
                  <td>10</td>
                  <th>Active</th>
                  <th>
                      <a href="/edit-courier" class="btn btn-info"> Update</a>
                      <a href="" class="btn btn-danger">Delete</a>
                  </th>
                </tr>
                
              </tbody>
            </table>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="/add-courier" class="btn btn-primary">Add</a>
        </div>
        <!-- /.box-footer-->
      </div>
@endsection