@extends('layouts.master-operator')

@section('header','Users')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i>Users</a></li>
      </ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List Users</h3>

          
        </div>

        <div class="box-body">
          
        <table class="table table-bordered">
                <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Office</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1.</td>
                  <td>POS-459</td>
                  <td>User 1</td>
                  <td>email@email.com</td>
                  <th>
                      <a href="/edit-users" class="btn btn-info"> Update</a>
                      <a href="" class="btn btn-danger">Delete</a>
                  </th>
                </tr>
                
              </tbody>
            </table>
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="/add-users" class="btn btn-info"> Add</a>
        </div>
        <!-- /.box-footer-->
      </div>
@endsection