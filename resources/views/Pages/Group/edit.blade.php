@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet" />
    <link href="{{ url('css/form.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <!-- Handling Form errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <div class="row">
        <form id="msform" action="{{ route('groups.update', ['id'=>$group->id]) }}"
            method="post" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <!-- fieldsets HEAD-->
            <fieldset id="edit_group" class="edit_group">
                <h2 class="fs-title">Edit Group</h2>
                <h3 class="fs-subtitle">Edit informations of the group</h3>

                <div class="form-group">
                    <img src="{{ url($group->picture_path) }}" alt="" width="200" height="200">
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Profile Photo</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" id="upload" name="profile_photo" type="file" placeholder="{{ $group->picture_path }}"
                        value="{{ $group->picture_path }}" />
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Group Name</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="group_name" type="text" placeholder="{{ $group->name }}" value="{{ $group->name }}"
                    />
                </div>

                <div class="form-group row align-items-center">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Description</label>
                    <textarea class="col-sm-12 col-md-9 col-lg-8" rows="4" name="description" placeholder="{{ $group->description }}">{{ $group->description }}</textarea>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Invite Users</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="usersDropdown" name="users[]" multiple>
                        @foreach($userList as $user)
                            <option value="{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option>
                        <!-- needed for selct2.js library don't remove!-->
                        @foreach($topicList as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-12 col-md-3 col-lg-3" align="right">Visibility</label>
                        <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                            @if($group->public === "public")
                                <option selected value="public">Public</option>
                                <option value="private">Private</option>
                                @else
                                <option value="public">Public</option>
                                <option selected value="private">Private</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- inserire if per bottone visibile solo da admin -->
                <hr>
                <a href="#" id="btn-newgroup" class="btn btn-danger btn-sm" role="button" data-toggle="modal" data-target="#deleteGro">Delete Group</a>
                <hr>

                <input type="submit" name="submit" class="next action-button" value="Update" />
            </fieldset>
        </form>
    </div>

    <!-- MODAL CONFIRM DELETE GROUP -->
    <div class="modal fade" id="deleteGro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="">Confirm Group Delete</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12" align="center">Really, do you want to delete this group?</div>
                        <form action="{{ route('groups.destroy', ['id'=>$group->id]) }}"
                            method="POST">
                            <fieldset id="edit_group" class="edit_group">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <div class="modal-footer no-border">
                                    <input type="submit" name="submit" class="btn btn-danger btn-sm" role="button" value="Yes, Delete">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/Group/editGroup.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection