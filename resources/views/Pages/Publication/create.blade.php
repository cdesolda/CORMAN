@extends ('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet" />
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

        <!-- MultiStep Form -->
        <div class="row">

                <form id="msform" action="{{route('publications.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- progressbar -->
                    <ul id="progressbar" class="pt-2">
                        <li class="active">General Info</li>
                        <li>Details</li>
                        <li>Media</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset id="primary">
                        <h2 class="fs-title">General Info</h2>
                        <h3 class="fs-subtitle">Insert general informations about the publication here</h3>

                        <input type="text" name="title" placeholder="Title*"/>
                        <div class="row">
                        <select class="form-control" id="authorsDropdown" name="authors[]" multiple>
                            <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($authorList as $author)
                                <option value="{{$author->id}}"> {{$author->name}}</option>
                            @endforeach
                        </select>
                      </div>
                        <input type="date" name="publication_date" placeholder="Publication Date"/>
                        <input type="text" name="venue" placeholder="Venue*"/>
                        <div class="row">
                        <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                                <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                                @foreach($topicList as $topic)
                                <option value="{{$topic->name}}">{{$topic->name}}</option>
                                @endforeach
                        </select>
                      </div>
                      <div class="row">
                        <select class="form-control" id="pub-type" name="type">
                            <option value="journal" >Journal/Article</option>
                            <option value="conference" >Conference/Workshop</option>
                            <option value="editorship" >Editorship</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Visibility</label>
                        <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="visibility" name="visibility">
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        </select>
                    </div>

                        <input type="button" name="next" class="next action-button col-lg-" value="Next"/>
                    </fieldset>

                    <fieldset id="journalFieldset">
                        <h2 class="fs-title">Journal/Articles Details</h2>
                        <h3 class="fs-subtitle">Insert here some info about Journal</h3>
                        <textarea rows="4" name="journal_abstract" placeholder="Abstract"></textarea>
                        <input type="text" name="journal_volume" placeholder="Volume"/>
                        <input type="text" name="journal_number" placeholder="Number"/>
                        <input type="text" name="journal_pages" placeholder="Pages"/>
                        <input type="text" name="journal_key" placeholder="Key"/>
                        <input type="text" name="journal_doi" placeholder="DOI"/>
                        <input type="text" name="journal_ee" placeholder="EE"/>
                        <input type="text" name="journal_url" placeholder="URL"/>

                        <a href='#' class="fake_btn_previous" data-role='button'>Previous</a>
                        <a href='#' class="fake_btn" dusk="buttonNext" data-role='button'>Next</a>
                    </fieldset>


                    <fieldset id="conferenceFieldset">
                        <h2 class="fs-title">Conference/Workshop Details</h2>
                        <h3 class="fs-subtitle">Insert here some info about Conference</h3>
                        <textarea rows="4" name="conference_abstract" placeholder="Abstract"></textarea>
                        <input type="text" name="conference_pages" placeholder="Pages"/>
                        <input type="text" name="conference_days" placeholder="Days"/>
                        <input type="text" name="conference_key" placeholder="Key"/>
                        <input type="text" name="conference_doi" placeholder="DOI"/>
                        <input type="text" name="conference_ee" placeholder="EE"/>
                        <input type="text" name="conference_url" placeholder="URL"/>
                        <a href='#' class="fake_btn_previous" data-role='button'>Previous</a>
                        <a href='#' class="fake_btn" dusk="button2Next" data-role='button'>Next</a>
                    </fieldset>


                    <fieldset id="editorshipFieldset">
                        <h2 class="fs-title">Editorship</h2>
                        <h3 class="fs-subtitle">Insert here some info about Editorship</h3>
                        <textarea rows="4" name="editorship_abstract" placeholder="Abstract"></textarea>
                        <input type="text" name="editorship_volume" placeholder="Volume"/>
                        <input type="text" name="editorship_publisher" placeholder="Publisher"/>
                        <input type="text" name="editorship_key" placeholder="Key"/>
                        <input type="text" name="editorship_doi" placeholder="DOI"/>
                        <input type="text" name="editorship_ee" placeholder="EE"/>
                        <input type="text" name="editorship_url" placeholder="URL"/>

                        <a href='#' class="fake_btn_previous" data-role='button'>Previous</a>
                        <a href='#' class="fake_btn" dusk="button3Next" data-role='button'>Next</a>
                    </fieldset>

                    <fieldset id="media">
                        <h2 class="fs-title">Media</h2>
                        <h3 class="fs-subtitle">Add here some media about the publication</h3>

                        <div class="form-group col">
                            <label class="col-sm-12 col-md-3 col-lg-4">Add PDF <i class="ion-document-text" aria-hidden="true"></i></label>
                            <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="pdf_file" accept=".pdf,.doc" style="display: all;">
                        </div> 
                        <div class="form-group col">
                            <label class="col-sm-12 col-md-3 col-lg-4">Add Files <i class="ion-images" aria-hidden="true"></i></label>
                            <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="media_file[]" accept="image/*" multiple style="display: all;">
                        </div> 
                            
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="submit" name="submit" dusk="buttonCreate" class="submit action-button" value="Create"/>
                    </fieldset>
                </form>

        </div>
@endsection

@section('script')

    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryformPublication.js') }}"></script>
    <script src="{{ url('js/Publication/createPublication.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
