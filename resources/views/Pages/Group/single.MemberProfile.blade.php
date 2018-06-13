<div class="group_item col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card text-left">
        <img class="card-img-top" src="{{url($group->picture_path)}}" alt="Card image cap" height="100" width="100">
        <div class="card-block">
            <div id="titleCard" class="card-text ">{{$group->name}}</div>
            <hr>
            <div id="descriptionCard" class="card-text">{{$group->description}}</div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-between align-items-center">
                <div id="edit_button" class="">
                    <a href="{{route('groups.show', ['id'=>$group->id])}}" id="btn-newgroup" class="btn btn-primary btn-sm" role="button">View More</a>
                </div>
            </div>
        </div>
    </div>
</div>
