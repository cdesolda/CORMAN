<div class="row">
    <div class="col-12 section-header pt-2">
        <h5>Researcher</h5>
    </div>
</div>
@foreach(($listSettings['researchers']) as $researecher)
    <div class="row section-content">
        <div class="col-10">
            <span>{{ $researecher->name }}</span>
        </div>
        <div class="col-2">
            <input id="toggle-researcher-{{ $researecher->id }}" type="checkbox" checked data-toggle="toggle">
        </div>
    </div>
@endforeach
<div class="row mt-2">
    <div class="col-12 section-header pt-2">
        <h5>Research Lines</h5>
    </div>
</div>
@foreach(($listSettings['research_lines']) as $research_line)
    @if($research_line) 
        <div class="row section-content">
            <div class="col-10">
                <span>{{ $research_line->name }}</span>
            </div>
            <div class="col-2">
                <input id="toggle-researchLine-{{ $research_line->id }}" type="checkbox" checked data-toggle="toggle">
            </div>
        </div>
    @endif
@endforeach
<div class="row mt-2">
    <div class="col-12 section-header pt-2">
        <h5>Publication Type</h5>
    </div>
</div>
<select class="custom-select my-2" id="type-select">
    <option selected value="all">All types</option>
    @foreach(($listSettings['publication_types']) as $publication_type)
        <option value="{{ $publication_type }}">{{ $publication_type }}</option>
    @endforeach
</select>
<div class="row mt-2">
    <div class="col-12 section-header pt-2">
        <h5>Sorting</h5>
    </div>
</div>
<div class="input-group my-2">
    <div class="input-group-prepend">
        <label class="input-group-text" for="date-sorting-select">Date</label>
    </div>
    <select class="custom-select" id="date-sorting-select">
        <option selected value="desc">Descending</option>
        <option value="asc">Ascending</option>
    </select>
</div>
<div class="row">
    <div class="col-12 section-footer pt-2">
        <button type="button" id="apply-button" class="btn btn-primary btn-lg btn-block">Apply</button>
    </div>
</div>