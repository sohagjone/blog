@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tag</h1>
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
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tag</h3>
              </div>
              @include('includes.message')
              <form action="{{route('tag.store')}}" method="post">
              {{ @csrf_field() }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="tag_titles">Tag Titles</label>
                    <input type="text" class="form-control" id="titles" name="name" placeholder="Enter Titles">
                  </div>
                 
                  <div class="form-group">
                    <label for="tag_slug">Tag Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                  </div>
                  </div>
                  
             </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('tag.index')}}">Back</a>
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
