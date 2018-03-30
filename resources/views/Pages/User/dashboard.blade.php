@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-7 col-md-7 col-lg-8 col-xl-9">
                <div id="titlePubblDash">Last publication</div>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a id="specialButton" dusk="newPublicationButton" role="button" class="btn btn-warning pull-left" href="{{ route('publications.create')}}">
                        <span class="ion-plus-circled"> New Publication</span>
                    </a>
                    <a id="button" role="button" class="btn btn-primary pull-right" href="{{ route('publications.index')}}">
                        <span> View All</span>    
                    </a>
                </div>
                @foreach($publicationList as $publication)
                    @include('Pages.Publication.single', ['publication'=>$publication])
                @endforeach
            </div>

            <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-3">
                <div id="titleGroupDash">Last from groups</div>
                <div class="btn-toolbar justify-content-between col-lg-12">
                    <a id="specialButton" dusk="newGroupButton" role="button" class="btn btn-warning pull-left" href="{{ route('groups.create')}}">
                        <span class="ion-plus-circled ion-plus"> New Group</span>
                    </a>
                    <a href="{{ route('groups.index')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">View All</a>
                </div>
                @foreach($groupList as $group)
                    @include('Pages.Group.single', ['group'=>$group])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
