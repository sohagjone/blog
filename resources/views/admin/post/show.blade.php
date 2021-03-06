
@extends('admin.layouts.app')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Post List</h1>
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
              <a class= "col-lg-offset-6 btn btn-success" href="{{route('post.create')}}">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 
                  <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Slug</th>
                    <th>Dated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td>{{$loop->index +1}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->subtitle}}</td>
                    <td>{{$post->slug}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a class="btn btn-info" href="{{route('post.edit', $post->id)}}">Edit</a></td>
                    <form action="{{route('post.destroy', $post->id)}}" style="display:none" id="delete-form-{{$post->id}}" method="post">
                    {{ @csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>
                    <td><a class="btn btn-danger" href="#" onclick="if(confirm('Are You Sure, Your Want to Delete this?')){
                      event.preventDefault();document.getElementById('delete-form-{{$post->id}}').submit();
                      }else
                      {
                        event.preventDefault();
                      }" >Delete</a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.No</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Slug</th>
                    <th>Dated</th>
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
