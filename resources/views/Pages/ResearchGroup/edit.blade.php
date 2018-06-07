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
        <form id="msform" action="{{ route('researchGroups.update', ['id'=>$group->id]) }}"
            method="post" enctype="multipart/form-data">
            {{ csrf_field() }} {{ method_field('PUT') }}
            <!-- fieldsets HEAD-->
            <fieldset id="edit_group" class="edit_group">
                <h2 class="fs-title">Edit Research Group</h2>
                <h3 class="fs-subtitle">Edit informations of the research group</h3>

                <div class="form-group">
                    <img src="{{ url($researchGroup->picture_path) }}" alt="" width="200" height="200">
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Profile Photo</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" id="upload" name="profile_photo" type="file" placeholder="{{ $researchGroup->picture_path }}"
                        value="{{ $researchGroup->picture_path }}" />
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Research Group Name</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="group_name" type="text" placeholder="{{ $researchGroup->name }}" value="{{ $researchGroup->name }}"
                    />
                </div>

                <div class="form-group row align-items-center">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Description</label>
                    <textarea class="col-sm-12 col-md-9 col-lg-8" rows="4" name="description" placeholder="{{ $researchGroup->description }}">{{ $researchGroup->description }}</textarea>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Members</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="usersDropdown" name="users[]" multiple>
                        @foreach($userList as $user)
                                <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Admins</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="adminsDropdown" name="admins[]" multiple>
                        @foreach($membersList as $member)
                            <option value="{{ $member->id }}"> {{ $member->first_name }} {{ $member->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Edit Research Lines</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="researchLinesDropdown" name="researchLines[]" multiple>
                        <option value=""></option>
                        <!-- needed for selct2.js library don't remove!-->
                        @foreach($researchLinesList as $researchLine)
                            <option value="{{ $researchLine->id }}">{{ $researchLine->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Edit Offices</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="officesDropdown" name="offices[]" multiple>
                        <option value=""></option>
                        <!-- needed for selct2.js library don't remove!-->
                        @foreach($officesList as $office)
                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>
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
                        <a href="{{ route('groups.destroy', ['id'=>$group->id]) }}" id="btn-newgroup"
                            class="btn btn-danger btn-sm" role="button">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/ResearchGroup/editResearchGroup.js') }}"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection