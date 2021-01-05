@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post</h1>
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
             
            @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
              {{ @csrf_field() }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="titles">Post Titles</label>
                    <input type="text" class="form-control" id="titles" name="title" placeholder="Enter Titles">
                  </div>
                  <div class="form-group">
                    <label for="subtitle">Post Sub Titles</label>
                    <input type="text" class="form-control" id="sub-titles" name="subtitle" placeholder="Enter Subtitles">
                  </div>
                  <div class="form-group">
                    <label for="subtitle">Post Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                  </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1">
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                  </div>
                </div>
              </div>
              <div class="form-group col-lg-6">
                  <label>Select Category</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true" name="categories[]">
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                  </select>
                </div>
           
                <div class="form-group col-lg-6">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="tags[]">
                  @foreach ($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
                   @endforeach
                  </select>
                </div>
            <div class="card-header">
              <h3 class="card-title">
                Write Body Text Here
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <textarea id="editor" class="textarea" name ="body" style="width:100%;height:200px; font-size:14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                
              </textarea>
            </div>
             </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('post.index')}}">Back</a>
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
