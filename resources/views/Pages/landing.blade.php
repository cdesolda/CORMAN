@extends('Layout.mainGuest')

@section('head')
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"><!-- animazioni -->


<!-- Custom styles for this template -->
<link href="{{ url('css/landing-page.css') }}" rel="stylesheet">

@endsection

@section('content')


  <!-- Masthead -->
  
  <section class="cover text-white text-center">
      <div class="overlay"></div>
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="animated fadeIn">Welcome on Corman</h1>
            <h2 class="animated fadeIn">Connect, share and start to build new knowledge right now!</h1>
            
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
    </section>

    <!-- Activity  -->
    <section style="background-position: right bottom; background-size: cover; background-repeat: repeat; background-attachment: fixed;;" class="img1 text-white text-center">
      <div class="overlay"></div>
        <div class="row">

          <div class="col-xl-9 mx-auto">
              <h1>Collaborate</h1>
              <h2>Share your ideas with colleagues, solve problems toghether has never been easy!</h2>
          </div>

      </div>
    </section>
    

    <section style="background-position: right bottom; background-size: cover; background-repeat: repeat; background-attachment: fixed;;" class="img2 text-white text-center">
      <div class="overlay"></div>
        <div class="row">
          <div class="col-xl-9 mx-auto">
            
              <h1 class="mb-5">Research</h1>
              <h2>Discover novel papers everyday, try our brand new topic-based search engine</h2>
           
          </div>
      </div>
    </section>
    
    
    <section style="background-position: right bottom;  background-size: cover; background-repeat: repeat; background-attachment: fixed;" class="img3 text-white text-center">
      <div class="overlay"></div>
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5"> Manage</h1>
            <h2>Syncronize and arrange your research from different platform is a breeze with Corman 
            </h2>
          </div>
      </div>
    </section>
    
    <!-- Get Started -->
    <section class="text-center p-4 bg-dark text-light" >
    <div class="container">
      <div class="row">
        
        <div class="my-5 mx-auto col-lg-6 col-md-8">
          <h2 class="mb-3 mx-auto">Ready to get started? Sign up now!</h2>
          <div class="col-8 col-xl-4 col-sm-8 col-md-3 my-auto mx-auto ">
              <a href="{{ url('signUp') }}">
          <button type="submit" class="btn btn-block btn-lg btn-success">Join Us!</button>
              </a>
            </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

