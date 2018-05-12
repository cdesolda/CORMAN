<div class="group_item forDashboard col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <a class="black" href="{{ route('groups.show', ['id'=>$group->id]) }}"
        class="row">
        <div class="container">
            <div class="row">
                <div class="col-9 marginReduced"  style="cursor: pointer;">
                    <span id="title">{{ $group->name }}</span>
                    <br>
                    <ul class="list-inline">    
                            @foreach(($group->topics) as $topic)
                                <li class="list-inline-item">{{$topic->name}}</li>
                            @endforeach
                        </ul>
                </div>
                <div class="col-3" id="title" style="cursor: pointer;">
                    <img class="groupImage" src="{{ url($group->picture_path) }}" alt="Card image cap">
                </div>
            </div>
        </div>
    </a>
</div>
</div>