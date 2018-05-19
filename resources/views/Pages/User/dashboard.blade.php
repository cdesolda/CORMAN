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

            </div>

            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                <div class="publicationContainer">
                        <div id="titlePubblDash">Publications</div>
                        <div class="btn-toolbar justify-content-between col-lg-12">
                            @foreach($publicationList as $publication)
                                @include('Pages.Publication.singleInDashboard', ['publication'=>$publication])
                            @endforeach
                            <a id="specialButton" dusk="newPublicationButton" role="button" class="btn btn-outline-warning pull-left" href="{{ route('publications.create') }}">
                                <span class="ion-plus-circled"> New Publication</span>
                            </a>
                            <a id="button" role="button" class="btn btn-outline-primary pull-right" href="{{ route('publications.index') }}">
                                <span> View More</span>
                            </a>
                        </div>        
                </div>
                <div class="researchGroupContainer">
                    <div id="titleResearchGroupDash">Research Groups</div>
                    @foreach($researchGroupsList as $researchGroup)
                        @include('Pages.ResearchGroup.singleInDashboard', ['researchGroup'=>$researchGroup])
                    @endforeach
                    <div class="btn-toolbar justify-content-between col-lg-12">
                        <a id="specialButton" dusk="newResearchGroupButton" role="button" class="btn btn-warning pull-left">
                            <span class="ion-plus-circled ion-plus"> New Research Group</span>
                        </a>
                        <a   id="btn-newresearchGroup" class="btn btn-outline-primary pull-right" role="button">View More</a>
                    </div>
                </div>
                <div class="groupContainer">
                    <div id="titleGroupDash">Communities</div>
                    @foreach($groupList as $group)
                        @include('Pages.Group.singleInDashboard', ['group'=>$group])
                    @endforeach
                    <div class="btn-toolbar justify-content-between col-lg-12">
                        <a id="specialButton" dusk="newGroupButton" role="button" class="btn btn-warning pull-left" href="{{ route('groups.create') }}">
                            <span class="ion-plus-circled ion-plus"> New Community</span>
                        </a>
                        <a href="{{ route('groups.index') }}" id="btn-newgroup" class="btn btn-outline-primary pull-right" role="button">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection