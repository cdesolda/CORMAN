@extends('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-7 col-lg-7">
                <div id="titleActivitiesDash">Recent Activities</div>
                @foreach($activities as $activity)
                    @switch($activity['type'])
                        @case('postAdded')
                        @include('Pages.Post.singleInDashboard', ['activity'=>$activity])
                        @break
                    @endswitch
                @endforeach
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                @foreach($items as $item)
                    @if(!is_null($item))
                        @include('Pages.User.dashboardItem', ['item'=>$item])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection