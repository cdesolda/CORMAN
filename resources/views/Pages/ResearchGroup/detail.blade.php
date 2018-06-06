@extends('Layout.main')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/ResearchGroup/researchGroup.css') }}">
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Group Info -->
        <div id="groupInfo" class="col">
            <div class="row">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                    <img class="card-img-top myImage" src="{{ url($researchGroup->picture_path) }}" alt="Card image cap" height="250" width="250">
                </div>
                <div class="col-7 col-sm-7 col-md-7 col-lg-6 col-xl-6">
                    <div style="display:inline;" id="titleDetail">{{ $researchGroup->name }}</div>
                    @if(!$isMember)
                    <a href="{{route('researchGroups.show', ['id'=>$researchGroup->id])}}" class="btn btn-primary pull-right myButton">JOIN</a>
                    @endif
                    <a href="#">
                        <i class="ion-edit col-lg-4"></i>
                    </a>
                    <i id="exit" class="ion-android-exit col-lg-4" role="button" data-toggle="modal" data-target="#exitGroup"></i>
                    <hr>
                    <div id="descriptionDetail">{{ $researchGroup->description }}</div>
                    <hr>
                    <div id="topicsDetail">
                        <ul class="list-inline">
                            @foreach(($researchGroup->research_lines) as $research_line)
                                <li class="list-inline-item">{{ $research_line->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="border-left: 1px solid #eaeaea;" class="col-2 col-sm-2 col-md-2 col-lg-3 col-xl-4">
                    <div class="row">
                        @foreach(($researchGroup->members) as $member)
                            <div class="col-12">
                                <div class="row px-3 pb-3">
                                    <div class="col-2 p-0">
                                        <img class="img-fluid user-image" src="{{ url($member->picture_path) }}" alt="User avatar">
                                    </div>
                                    <div class="col-10 p-0 pl-2">
                                        <a href="{{ route('users.show', ['user'=>$member]) }}">{{ $member->first_name }} {{ $member->last_name }}</a>
                                        <br>
                                        <span class="post-date textLighter">{{ $member->role->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-sm-10 col-md-10 col-lg-9 col-xl-8">
                        <ul class="list-inline">
                                @foreach(($researchGroup->offices) as $office)
                                    <li class="list-inline-item">{{ $office->address }}</li>
                                @endforeach
                            </ul>
                </div>
                <div class="col-2 col-sm-2 col-md-2 col-lg-3 col-xl-4">
                        <span style="display:block;" class="text-truncate">{{ $researchGroup->contacts }}</span>
                </div>
            </div>
        </div>

        <!-- Group Publications -->
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-between">

                    <div class="col-lg-12">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="publications-tab" data-toggle="tab" href="#publications" role="tab" aria-controls="publications"
                                    aria-selected="true">Publications</a>
                            </li>
                        </ul>

                        <p></p>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="publications" role="tabpanel" aria-labelledby="publications-tab">
                                <!-- Publications section -->

                                <div class="row justify-content-between">
                                    <div class="col-lg-10">
                                        <a href="#" id="btn-share" dusk="shareButton" class="btn btn-primary" role="button" data-toggle="modal" data-target="#addPublication">
                                            <span class="ion-plus-circled"> Share</span>
                                        </a>
                                    </div>
                                    <div class="col-lg-2">
                                        <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom"
                                            data-content="@include('Pages.filter')"></i>
                                    </div>
                                </div>

                                <div class="row">
                                    @foreach($sharesList as $share)
                                        @include('Pages.Publication.singleInGroup', ['share'=>$share])
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

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
                            <a href="#" id="btn-newgroup" class="btn btn-primary btn-sm" role="button">OK</a>
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

    <!-- Modal CONFIRM Add Post in Group -->
    <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="addPost" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addPost">Public Post in this Group</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12" align="center">
                            <p>Your Post has been published!</p>
                        </div>
                        <div class="col-lg-12" align="center">
                            <a href="#" id="btn-newgroup" class="btn btn-primary btn-sm" role="button">OK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-en-US.min.js"></script>
    <script src="{{ url('js/Group/sharePublication.js') }}"></script>
    <script src="{{ url('js/Group/sharePost.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
    <script>
        $(document).ready(function () {

            $("a#btn-post").addClass("disabled");

            $("textarea#post_content").on("input", function () {
                if ($("textarea#post_content").val())
                    $("a#btn-post").removeClass("disabled");
                else
                    $("a#btn-post").addClass("disabled");
            });

        });
    </script>

@endsection