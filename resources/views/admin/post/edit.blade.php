@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
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
              <form role="form" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
              {{ @csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="titles">Post Titles</label>
                    <input type="text" class="form-control" id="titles" name="title" value="{{$post->title}}">
                  </div>
                  <div class="form-group">
                    <label for="subtitle">Post Sub Titles</label>
                    <input type="text" class="form-control" id="sub-titles" name="subtitle" value="{{$post->subtitle}}">
                  </div>
                  <div class="form-group">
                    <label for="subtitle">Post Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
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
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" @if($post->status == 1) 
                      {{'checked'}}
                    @endif>
                    <label class="form-check-label" >Publish</label>
                  </div>
                </div>
              </div>

              <div class="form-group col-lg-6">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true"  name="tags[]">
                  @foreach ($tags as $tag)
                  <option value="{{$tag->id}}"
                  @foreach($post->tags as $postTag)
                    @if($postTag->id == $tag->id)
                      selected                        
                    @endif

                  @endforeach
                  
                  >{{$tag->name}}</option>
                   @endforeach
                  </select>
                </div>

              <div class="form-group col-lg-6">
                  <label>Select Category</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true"  name="categories[]">
                   @foreach ($categories as $category)
                  <option value="{{$category->id}}" 
                  @foreach($post->categories as $postCategory)
                    @if($postCategory->id == $category->id)
                      selected                        
                    @endif

                  @endforeach  
                  
                  >{{$category->name}}</option>
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
              {{$post->body}}
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
