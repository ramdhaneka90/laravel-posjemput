@extends('layouts.master-operator')

@section('header','Users')

@section('breadcumb')
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Users</a></li>
      </ol>
@endsection

@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add User</h3>

          
        </div>

        <div class="box-body">
        <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Office</label>
                  <select name="office_id" class="form-control">
                      <option value="">POS-123</option>
                      <option value="">POS-321</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <input type="text" class="form-control" name="role">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/users" class="btn btn-info">Back</a>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        
        </div>
        <!-- /.box-footer-->
      </div>
@endsection