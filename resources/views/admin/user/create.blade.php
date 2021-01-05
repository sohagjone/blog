@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"> <a  class="btn btn-danger" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>
 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
            </form></li>
              
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <div class="card card-primary">
           
              @include('includes.message')
              <form action="{{route('user.store')}}" method="post">
              {{ @csrf_field() }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                  </div>
                 
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                  </div>
                
                  
                   <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                  </div>

                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Enter Confirm Password">
                  </div>

                  <div class="form-group col-lg-12">
                    <label for="Role">Assign Role</label>
                    <div class="row">
                       @foreach ($roles as $role)
                    <div class="col-lg-4">
                        <div class="checkbox">
                     <label>
                      <input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}
                    </label>
                      </div>
                    </div>
                    @endforeach

                    </div>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('user.index')}}">Back</a>
                </div>
              </form>
            </div>
          
          
      <!-- ./row -->
      
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
