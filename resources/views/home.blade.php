@extends('user/app')
@section('bg-img', asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title', 'Welcome to Home')
@section('sub-heading', )
@section('main-content')
<!-- Post Content -->

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        Welcome to {{ Auth::user()->name }}
                </div>
            </div>
        </div>
  </article>


@endsection
@section('footer')
@endsection














