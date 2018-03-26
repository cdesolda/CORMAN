@extends('Layout.mainGuest')

@section('head')
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">


<!-- Custom styles for this template -->
<link href="{{ url('css/landing-page.css') }}" rel="stylesheet">

@endsection

@section('content')
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Connect, share and start to build new knowledge right now!</h1>
          </div>
          <div class="col-6 col-md-10 col-sm-4 col-lg-8 col-xl-4 mx-auto">
              <div class="form-row">
                  
                </div>
                <div class="col-12 col-xl-6 col-sm-12 col-md-3 my-2 mx-auto">
                    <a href="{{ url('signUp') }}">
                        <button type="submit" class="btn btn-block btn-lg btn-success">Join Us!</button>
                    </a>
                </div>
                <div class="col-12 col-xl-6 col-sm-12 col-md-3 my-2 mx-auto">
                    <a href="{{ url('login') }}">
                        <button type="submit" class="btn btn-block btn-lg btn-primary">Login</button>
                    </a>
                </div>
                 </div>
          </div>
        </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-share m-auto text-primary"></i>
              </div>
              <h3>Collaborate</h3>
              <p class="lead mb-0">Share your ideas with colleagues, solve problems together has never been easy!</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-book-open m-auto text-primary"></i>
              </div>
              <h3>Research</h3>
              <p class="lead mb-0">Discover novel papers everyday, try our brand new topic-based search engine</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-organization m-auto text-primary"></i>
              </div>
              <h3>Manage</h3>
              <p class="lead mb-0">Syncronize and arrange your research from different platform is a breeze with corman  </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="mb-4">Ready to get started? Sign up now!</h2>
          </div>
          <div class="col-sm-6 col-md-10 col-lg-8 col-xl-7 mx-auto">
              <div class="form-row" >

                <div class="col-12 col-sm-12 col-md-3 mx-auto">
                    <a href="{{ url('signUp') }}">
                        <button class="btn btn-block btn-lg btn-success">Join Us!</button>
                    </a>
                </div>

               </div>
          </div>
        </div>
      </div>
    </section>
@endsection

