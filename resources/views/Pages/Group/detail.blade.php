@extends ('Layout.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <link rel="stylesheet" href="{{ url('css/Group/groups.css') }}">
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        
            
            <!-- Group Info -->
            <div id="groupInfo" class="col">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <img class="card-img-top" src="{{url($theGroup->picture_path)}}" alt="Card image cap" height="250" width="250">
                    </div>
                    <div class="col-7 col-sm-7 col-md-7 col-lg-6 col-xl-8">
                        <div id="titleDetail">{{$theGroup->name}}</div>
                        <hr>
                        <div id="descriptionDetail">{{$theGroup->description}}</div>
                        <hr>
                        <div id="topicsDetail">
                            <ul class="list-inline">    
                                @foreach(($theGroup->topics) as $topic)
                                    <li class="list-inline-item">{{$topic->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 col-lg-3 col-xl-1">
                        @if($theGroup->public === "public")
                            <i class="ion-eye col-lg-4"></i>
                        @else
                            <i class="ion-eye-disabled col-lg-4" align="right"></i>
                        @endif 
                        <a href="{{route('groups.edit', ['id'=>$theGroup->id])}}"><i class="ion-edit col-lg-4"></i></a>
                        <i  id="exit" class="ion-android-exit col-lg-4" role="button" data-toggle="modal" data-target="#exitGroup"></i>
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col-9 col-sm-9 col-md-10 col-lg-9 col-xl-9">
                    <div class="row justify-content-between">                 
                        <div class="col-lg-10">
                            <a href="#" id="btn-share" class="btn btn-primary" role="button" data-toggle="modal" data-target="#addPublication">
                                <span class="ion-plus-circled"> Share</span>
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($sharesList as $share)
                            @include('Pages.Publication.singleInGroup', ['share'=>$share])
                        @endforeach
                    </div>
                </div>

                <!-- Group List -->
                <div class="col-3 col-sm-3 col-md-2 col-lg-3 col-xl-3">
                    @foreach($groupList as $group)
                        @include('Pages.Group.single', ['group'=>$group])
                    @endforeach          
                </div>
            </div>
        </div>

        <!-- Modal Add Publications in Group -->
        <div class="modal fade" id="addPublication" tabindex="-1" role="dialog" aria-labelledby="addPublication" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="addPublication">Add Publications in this Group</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('Pages.Group.modalAddPublication')
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal CONFIRM Add Publications in Group -->
        <div class="modal fade" id="confirmAddPublication" tabindex="-1" role="dialog" aria-labelledby="addPublication" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="addPublication">Add Publications in this Group</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12" align="center">
                                <p>Your Publication has been added in group</p>
                            </div>
                            <div class="col-lg-12" align="center">
                                <a href="{{route('groups.show', ['id'=>$theGroup->id]) }}" id="btn-newgroup" class="btn btn-primary btn-sm" role="button">OK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal CONFIRM exit Group -->
        <div class="modal fade" id="exitGroup" tabindex="-1" role="dialog" aria-labelledby="addPublication" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="addPublication">Leave Group</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12" align="center">
                                <p>Are you sure to leave this group?</p>
                            </div>
                            <div class="col-lg-12" align="center">
                                <a id="yesLeaveGroup" class="btn btn-success" role="button">Yes</a>
                                <a id="noLeaveGroup" class="btn btn-danger" role="button">No</a>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="{{ url('js/Group/sharePublication.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection
