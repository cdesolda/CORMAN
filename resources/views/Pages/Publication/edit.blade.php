@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Errors Handling -->
    <div class="row" id="formErrors">
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

    <!-- Form -->
    <div id="edit" class="row">
        <form id="msform" action="{{route('publications.update',['id' => $publication->id])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset>
                <h2 class="fs-title">General Info</h2>
                <h3 class="fs-subtitle">Modify general informations about the publication here</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Title</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="title" type="text" value="{{$publication->title}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Authors</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="authorsDropdown" name="authors[]" multiple>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Date</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="pub_date" type="date" value="{{$publication->year}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Venue</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="venue" type="text"  value="{{$publication->venue}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                    </select>


                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3" align="right">Visibility</label>
                    @if($publication->public === 1)
                        <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        </select>
                    @else
                        <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                            <option value="public" >Public</option>
                            <option selected value="private" >Private</option>
                        </select>
                    @endif


                </div>
                <hr>
                @switch($publication->type)
                    @case('journal')
                        @include('Pages.Publication.editJournal', ['details'=>$publication->details])
                    @break
                    @case('conference')
                        @include('Pages.Publication.editConference', ['details'=>$publication->details])
                    @break
                    @case('editorship')
                        @include('Pages.Publication.editEditorship', ['details'=>$publication->details])
                    @break
                @endswitch
                <hr>
                <h2 class="fs-title">Media</h2>
                <h3 class="fs-subtitle">Add here some media about the publication</h3>
                <div class="form-group col">
                    <label class="col-sm-12 col-md-3 col-lg-4">Replace PDF <i class="ion-document-text" aria-hidden="true"></i></label>
                    <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="pdf_file" accept=".pdf" style="display: all;">
                </div> 
                <div class="form-group col">
                    <label class="col-sm-12 col-md-3 col-lg-4">Add Files <i class="ion-images" aria-hidden="true"></i></label>
                    <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="media_file[]" accept="image/*" multiple style="display: all;">
                </div>

                <hr>
                <a href="#" id="btn-deletePub" class="btn btn-danger btn-sm" role="button" data-toggle="modal" data-target="#deletePub">Delete Publication</a>
                <hr>
                <input type="submit" name="submit" class="submit action-button" value="Update"/>
            </fieldset>
        </form>
    </div>

    <!-- MODAL CONFIRM DELETE PUBLICATION -->
    <div class="modal fade" id="deletePub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modalPublicationTitle">Confirm Publication Delete</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12" align="center">Really, do you want to delete this publication?</div>
                        <form method="post" action="{{route('publications.destroy', $publication->id)}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" dusk="btn-confirmDeletePub">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/Publication/editPublication.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection
