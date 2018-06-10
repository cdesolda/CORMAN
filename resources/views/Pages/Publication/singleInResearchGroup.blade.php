<div class="publication_item col-lg-12">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <img src="{{url($share->user->picture_path)}}" style="border-radius: 50%;" width="30" height="30" alt="User Picture">
            Posted by: {{$share->user->first_name}} {{$share->user->last_name}} <span class="textLighter">{{smartDate($share->created_at)}}</span>
        </div>
    </div>
    <hr>

    <!-- first row -->
    <div class="row">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" id="title" style="cursor: pointer;" data-toggle="modal" data-target="#modalPublication_{{$share->publication->id}}">{{$share->publication->title}}</div>
        <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1" align="right" id="year">{{date('Y',strtotime($share->publication->year))}}</div>
    </div>
    <hr>
    <!-- second row -->
    <div class="row">
        <div id="authors" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ul class="list-inline">
                @foreach($share->publication->authors as $author)
                    @if($author->isCormanMember())
                        <li class="list-inline-item"><a href="{{route('users.show', ['user'=>$author->user])}}">{{$author->name}}</a></li>
                    @else
                        <li class="list-inline-item">{{$author->name}}</li>
                    @endif
                @endforeach
            </ul>
            <!--sistemare lo spazio che lascia dopo le liste-->
        </div>
    </div>

    <!-- third row -->
    @if($share->rline)
    <hr>
    <div class="row">
        <div id="venue" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">{{$share->rline->name}}</div>
    </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="modalPublication_{{$share->publication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalPublicationTitle">Publication' View</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('Pages.Publication.modal', ['publication'=>$share->publication])
            </div>
        </div>
    </div>
</div>
