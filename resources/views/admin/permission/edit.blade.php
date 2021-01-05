@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" ><a  class="btn btn-danger" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>
 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
            </form></li>
              </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <div class="card card-primary">
              
              @include('includes.message')
              <form action="{{route('permission.update', $permission->id)}}" method="post">
              {{ @csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="tag_titles">Permission Edit </label>
                    <input type="text" class="form-control" id="titles" name="name" value="{{$permission->name}}">
                  </div>
                  <div class="form-group">
                    <label for="tag_titles">Permission For </label>
                    <input type="text" class="form-control" id="titles" name="name" value="{{$permission->for}}">
                  </div>
             </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('permission.index')}}">Back</a>
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
