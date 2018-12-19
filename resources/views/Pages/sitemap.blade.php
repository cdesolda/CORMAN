@extends('Layout.mainGuest')

@section('head')
<link rel="stylesheet" href="{{ url('css/sitemap.css') }}">
@endsection

@section('content')
<div id="sitemap-container" class="mt-4 ml-3">
    <ul class="sitemap">
        <li><a href="{{route('landing')}}">Homepage - CORMAN.com</a></li>
        <ul>
            <li><a href="{{url('login')}}">Login</a></li>
            <li><a href="{{url('signUp')}}">Join Us</a></li>
        </ul>
    </ul>
</div>
@endsection
