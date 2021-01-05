@extends('user/app')
@section('bg-img', Storage::disk('local')->url($post->image))
@section('head')
<link rel="stylesheet" href="{{asset('user/css/prism.css')}}">
@endsection
@section('title', $post->title)
@section('sub-heading', $post->subtitle)
@section('main-content')
<!-- Post Content -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=665716687487610&autoLogAppEvents=1" nonce="Y9vpGOSb"></script>
  <article>
    <div class="container">
      <div class="row">
      
        <div class="col-lg-8 col-md-10 mx-auto">
        <small>Created At: {{$post->created_at->diffForHumans()}}</small><br>
        
          @foreach ($post->categories as $category)
          <a href=""><small class="pull-right" style = "margin-right:20px; border-radius:5px; border: 1px solid gray; padding:5px">
                {{$category->name}}
          </small></a> 
          @endforeach
        
          {!! htmlspecialchars_decode($post->body) !!}
               <!--tag Clouds-->
          <h3>Tags Clouds</h3>
          @foreach ($post->tags as $tag)
          <a href=""><small class="pull-right" style = "margin-right:20px; border-radius:5px; border: 1px solid gray; padding:5px">
                {{$tag->name}}
          </small></a> 
          @endforeach
        </div>
        <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="10"></div>
      </div>
    </div>
  </article>
     <hr>

@endsection
@section('footer')
<script src="asset('user/js/prism.js')"></script>
@endsection
