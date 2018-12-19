@extends('Layout.mainGuest')

@section('head')
    <base href="{{ URL::asset('/') }}">
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/User/registration.css') }}">

@endsection

@section('content')

    <!-- Handling Form errors -->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- MultiStep Form -->
    <div class="row" align="left">
        <form id="msform" action="{{ route('register')}}" method="post" enctype="multipart/form-data" autocomplete="on">
        {{ method_field('POST') }}
        {{csrf_field()}}
        <!-- progressbar -->
            <ul id="progressbar" class="up_fix">
                <li class="active">Personal Info</li>
                <li>Professional info</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Personal info</h2>
                <h3 class="fs-subtitle"></h3>


                    <label style="float: left;">First Name*</label>
                    <input type="text" name="first_name" placeholder="Es. Mario" value="{{ Request::old('first_name') }}" />

                    <label style="float: left;">Last Name*</label>
                    <input type="text" name="last_name" placeholder="Es. Rossi" value="{{ Request::old('last_name') }}" />

                    <label style="float: left;">Birth Date*</label>
                    <input type="date" name="birth_date" placeholder="Birth Date" value="{{ Request::old('birth_date') }}" />

                    <label style="float: left;">Email*</label>
                    <input type="email" name="email" placeholder="Es. mariorossi@gmail.com" value="{{ Request::old('email') }}" />

                    <label style="float: left;">Password (min. 6 caratteri)*:</label>
                    <input type="password" name="password" placeholder="Es. informatica95" value="{{ Request::old('password') }}" />

                    <label style="float: left;">Confirm Password*</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password*" value="{{ Request::old('password_confirmation') }}" />

                    <label style="float: left;">Profile Photo</label>
                    <input type="file" name="profilePic" placeholder="Profile Photo" />

                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Professional info</h2>
                <h3 class="fs-subtitle"></h3>


                    <label style="float: left;"> Role* </label>
                    <select class="form-control" id="role" name="role">
                        @foreach($roleList as $role)
                            <option>{{$role->name}}</option>
                        @endforeach
                    </select>



                    <label style="float: left;">Affiliation*</label>
                    <select class="form-control" id="role" name="affiliation">
                        @foreach($affiliationList as $affiliation)
                            <option>{{$affiliation->name}}</option>
                        @endforeach
                    </select>

                    <label style="float: left;" for="topicsDropdown"> Research Area* </label>
                    <select class="form-control row" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($topicList as $topic)
                            <option value="{{$topic->name}}">{{$topic->name}}</option>
                        @endforeach
                    </select>
                <label style="float: left;"> Personal Page</label>
                <input type="text" name="personal_link" placeholder="http://www.mariorossi.com"/>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryformRegistration.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/User/signUp.js') }}"></script>
@endsection
