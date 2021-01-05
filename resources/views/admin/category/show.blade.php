@extends('admin.layouts.app')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Category List</h1>
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
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
              <a class= "col-lg-offset-6 btn btn-success" href="{{route('category.create')}}">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 
                  <tr>
                    <th>S.No</th>
                    <th>Tag</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$loop->index +1}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td><a class="btn btn-info" href="{{route('category.edit', $category->id)}}">Edit</a></td>
                    <form action="{{route('category.destroy', $category->id)}}" style="display:none" id="delete-form-{{$category->id}}" method="post">
                    {{ @csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>
                    <td><a class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Your Want to Delete this?')){
                      event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();
                      }else
                      {
                        event.preventDefault();
                      }" >Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.No</th>
                    <th>Tag</th>
                    <th>Slug</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
              </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
