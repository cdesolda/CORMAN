<div class="card border-primary">
    <div class="row no-gutters">
            <div class="col-3">
                <img class="img-fluid pull-left" src="{{ url($researchGroup->picture_path) }}" alt="Research Group Logo">
            </div>
            <div class="col">
                <div class="card-block m-3">
                    <h4 class="card-title border-primary border-bottom">{{ $researchGroup->name }}</h4>
                    <p class="card-text">{{ $researchGroup->description }}</p>
                    <a href="{{route('researchGroups.show', ['id'=>$researchGroup->id])}}" class="btn btn-primary pull-right myButton">View More</a>
                </div>
            </div>
    </div>
</div>