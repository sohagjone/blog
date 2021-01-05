@extends('admin.layouts.app')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Role</h1>
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
              <form action="{{route('role.update', $role->id)}}" method="post">
              {{ @csrf_field() }}
              {{ method_field('PATCH') }}
                <div class="card-body">
                  <div class="col-lg-6">
                     <div class="form-group">
                    <label for="tag_titles">Role </label>
                    <input type="text" class="form-control" id="titles" name="name" value="{{$role->name}}">
                  </div>
                  <div class="col-lg-6">
               <label for="post">Post Permissions</label>
               @foreach($permissions as $permission)
                @if($permission->for == 'post')
               <div class="checkbox">
                  <label><input type="checkbox" name="permission[]"  value="{{$permission->id}}"  
                    @foreach ($role->permissions as  $role_permit)
                            @if($role_permit->id == $permission->id)
                            checked
                            @endif
                    @endforeach
                  >{{$permission->name}}</label>
               </div>
               @endif
               @endforeach
               </div>
               <div class="col-lg-6">
               <label for="user">User Permissions</label>
               @foreach($permissions as $permission)
                @if($permission->for == 'user')
               <div class="checkbox">
                  <label><input type="checkbox" value="{{$permission->id}}" name="permission[]"
                  @foreach ($role->permissions as  $role_permit)
                            @if($role_permit->id == $permission->id)
                            checked
                            @endif
                    @endforeach
                  
                  >{{$permission->name}}</label>
               </div>
               @endif
               @endforeach
               </div>
               <div class="col-lg-6">
               <label for="other">Other Permissions</label>
               @foreach($permissions as $permission)
                @if($permission->for == 'other')
               <div class="checkbox">
                  <label><input type="checkbox" value="{{$permission->id}}" name="permission[]"
                  
                  @foreach ($role->permissions as  $role_permit)
                            @if($role_permit->id == $permission->id)
                            checked
                            @endif
                    @endforeach
                  >{{$permission->name}}</label>
               </div>
               @endif
               @endforeach
               </div>
             </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-warning" href="{{route('role.index')}}">Back</a>
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
