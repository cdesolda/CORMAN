@extends('Layout.main')

@section('head')
    <link href="{{ url('css/Group/groups.css') }}" rel="stylesheet"/>
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
        <form id="msform" action="{{ route('groups.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Create Community</h2>
                <h3 class="fs-subtitle">Insert some informations about the community</h3>

                <input type="text" name="name" placeholder="Community Name"/>
                
                <textarea rows="4" name="description" placeholder="Description" ></textarea>
                
                <div class="row">
                    <select class="form-control" id="usersDropdown" name="users[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($userList as $user)
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="row">
                    <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($topicList as $topic)
                            <option value="{{$topic->name}}">{{$topic->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <input type="file" class="group_picture" id="upload" name="picture">
                
                <div class="form-group">
                    <div class="row align-items-center justify-content-center">
                        <label class="col-sm-12 col-md-3 col-lg-3">Visibility</label>
                        <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="visibility" name="visibility">
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        </select>
                    </div>
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
    <script src="{{ url('js/Group/createGroup.js') }}"></script>
@endsection
