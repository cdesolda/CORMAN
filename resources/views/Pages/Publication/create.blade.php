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
        <div class="row" align="left">

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

                        <label style="float: left;">Title*</label>
                        <input type="text" name="title" placeholder="Es. Piattaforma Corman" value="{{ Request::old('title') }}"/>

                        <label style="float: left;" for="authorsDropdown"> Authors* </label>
                        <select class="form-control" id="authorsDropdown" name="authors[]" multiple>
                            <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($authorList as $author)
                                <option value="{{$author->id}}"> {{$author->name}}</option>
                            @endforeach
                        </select>

                        <div class="row"></div>
                        
                        <label style="float: left;"> Date* </label>
                        <input type="date" name="publication_date" placeholder="Publication Date" value="{{ Request::old('publication_date') }}"/>

                        <label style="float: left;"> Venue* </label>
                        <input type="text" name="venue" placeholder="Es. IJPEDS" value="{{ Request::old('venue') }}"/>
                        
                        <label style="float: left;"> Type Publication Topics* </label>
                        <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                                <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                                @foreach($topicList as $topic)
                                <option value="{{$topic->name}}">{{$topic->name}}</option>
                                @endforeach
                        </select>
                      
                        <label style="float: left;"> Type of Publication* </label>
                        <select class="form-control" id="pub-type" name="type">
                            <option value="journal" >Journal/Article</option>
                            <option value="conference" >Conference/Workshop</option>
                            <option value="editorship" >Editorship</option>
                        </select>
                    
                    <div class="row"></div>
                    <div class="row"></div>

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
                        <label style="float: left;">Abstract</label>
                        <textarea rows="4" name="journal_abstract" placeholder="Es. La piattaforma Corman nasce..." value="{{ Request::old('journal_abstract') }}"></textarea>
                        <label style="float: left;">Volume</label>
                        <input type="text" name="journal_volume" placeholder="Es. 1" value="{{ Request::old('journal_volume') }}"/>
                        <label style="float: left;">Number</label>
                        <input type="text" name="journal_number" placeholder="Es. 1" value="{{ Request::old('journal_number') }}"/>
                        <label style="float: left;">Pages</label>
                        <input type="text" name="journal_pages" placeholder="Es. 100" value="{{ Request::old('journal_pages') }}"/>
                        <label style="float: left;">Key</label>
                        <input type="text" name="journal_key" placeholder="Es. journals/paapp/NomePV18" value="{{ Request::old('journal_key') }}"/>
                        <label style="float: left;">Digital object identifier (DOI)</label>
                        <input type="text" name="journal_doi" placeholder="Es. journals/paapp/NomePV18" value="{{ Request::old('journal_doi') }}"/>
                        <label style="float: left;">EE</label>
                        <input type="text" name="journal_ee" placeholder="Es. https://doi.org/10.1080/17445760.2017.1288808" value="{{ Request::old('journal_ee') }}"/>
                        <label style="float: left;">URL Publication</label>
                        <input type="text" name="journal_url" placeholder="https://dblp.org/rec/journals/paapp/NomePV18" value="{{ Request::old('journal_url') }}"/>

                        <a href='#' class="fake_btn_previous" data-role='button'>Previous</a>
                        <a href='#' class="fake_btn" dusk="buttonNext" data-role='button'>Next</a>
                    </fieldset>


                    <fieldset id="conferenceFieldset">
                        <h2 class="fs-title">Conference/Workshop Details</h2>
                        <h3 class="fs-subtitle">Insert here some info about Conference</h3>
                        <label style="float: left;">Abstract</label>
                        <textarea rows="4" name="journal_abstract" placeholder="Es. La piattaforma Corman nasce..." value="{{ Request::old('journal_abstract') }}"></textarea>
                        <label style="float: left;">Pages</label>
                        <input type="text" name="journal_pages" placeholder="Es. 100" value="{{ Request::old('journal_pages') }}"/>
                        <label style="float: left;">Days</label>
                        <input type="text" name="conference_days" placeholder="Es. 10/12/2000" value="{{ Request::old('conference_days') }}"/>
                        <label style="float: left;">Key</label>
                        <label style="float: left;">Digital object identifier (DOI)</label>
                        <input type="text" name="journal_doi" placeholder="Es. journals/paapp/NomePV18" value="{{ Request::old('journal_doi') }}"/>
                        <label style="float: left;">EE</label>
                        <input type="text" name="journal_ee" placeholder="Es. https://doi.org/10.1080/17445760.2017.1288808" value="{{ Request::old('journal_ee') }}"/>
                        <label style="float: left;">URL Publication</label>
                        <input type="text" name="journal_url" placeholder="https://dblp.org/rec/journals/paapp/NomePV18" value="{{ Request::old('journal_url') }}"/>
                        <a href='#' class="fake_btn_previous" data-role='button'>Previous</a>
                        <a href='#' class="fake_btn" dusk="button2Next" data-role='button'>Next</a>
                    </fieldset>


                    <fieldset id="editorshipFieldset">
                        <h2 class="fs-title">Editorship</h2>
                        <h3 class="fs-subtitle">Insert here some info about Editorship</h3>
                        <label style="float: left;">Abstract</label>
                        <textarea rows="4" name="journal_abstract" placeholder="Es. La piattaforma Corman nasce..." value="{{ Request::old('journal_abstract') }}"></textarea>
                        <label style="float: left;">Volume</label>
                        <input type="text" name="journal_volume" placeholder="Es. 1" value="{{ Request::old('journal_volume') }}"/>
                        <label style="float: left;">Publisher</label>
                        <input type="text" name="editorship_publisher" placeholder="Es. Mondadori" value="{{ Request::old('editorship_publisher') }}"/>
                        <label style="float: left;">Key</label>
                        <label style="float: left;">Digital object identifier (DOI)</label>
                        <input type="text" name="journal_doi" placeholder="Es. journals/paapp/NomePV18" value="{{ Request::old('journal_doi') }}"/>
                        <label style="float: left;">EE</label>
                        <input type="text" name="journal_ee" placeholder="Es. https://doi.org/10.1080/17445760.2017.1288808" value="{{ Request::old('journal_ee') }}"/>
                        <label style="float: left;">URL Publication</label>
                        <input type="text" name="journal_url" placeholder="https://dblp.org/rec/journals/paapp/NomePV18" value="{{ Request::old('journal_url') }}"/>

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
