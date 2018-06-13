@extends('Layout.main')

@section('head')
    <link href="{{ url('css/ResearchGroup/researchGroups.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/form.css') }}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">    
        
        <!-- Handling Form errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form id="msform" action="{{ route('researchGroups.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Create Research Group</h2>
                <h3 class="fs-subtitle">Insert some informations about the research group</h3>

                <input type="text" name="name" placeholder="Research Group Name"/>
                
                <textarea rows="4" name="description" placeholder="Description" ></textarea>

                <textarea rows="4" name="contacts" placeholder="Contact Informations" ></textarea>
                
                <div class="row">
                    <select class="form-control" id="usersDropdown" name="users[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($userList as $user)
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="row">
                    <select class="form-control" id="researchLinesDropdown" name="researchLines[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($researchLinesList as $researchLine)
                            <option value="{{$researchLine->name}}">{{$researchLine->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <select class="form-control" id="officesDropdown" name="offices[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($officesList as $office)
                            <option value="{{$office->address}}">{{$office->address}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-3" align="left">Research Group Logo</label>
                    <input class="col-8" type="file" class="group_picture" id="upload" name="picture">
                </div>
                
                
                
                <input type="submit" name="next" class="next action-button" value="Create"/>
            </fieldset>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryform.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/ResearchGroup/createResearchGroup.js') }}"></script>
@endsection
