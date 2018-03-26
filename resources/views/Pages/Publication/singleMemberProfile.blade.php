<div class="publication_item col-lg-12">
    <!-- first row -->
        <div class="row">
            <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" id="title" style="cursor: pointer;" data-toggle="modal" data-target="#modalPublication_{{$publication->id}}">{{$publication->title}}</div>
            <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1" align="right" id="year">{{date('Y',strtotime($publication->year))}}</div>
        </div>
    
    <hr>
    <!-- second row -->
    <div class="row">
        <div id="authors" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ul class="list-inline">
                @foreach($publication->authors as $author)
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
    <div class="row">
        <div id="venue" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">{{$publication->venue}}</div>
    </div>
    
    <hr>

    <!-- fourth row -->
    <div class="row">
        <div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10" id="topics">
            <ul class="list-inline">
                @foreach($publication->topics as $topic)
                    <li class="list-inline-item">{{$topic->name}}</li>
                @endforeach
            </ul>
            <!--sistemare lo spazio che lascia dopo le liste-->
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPublication_{{$publication->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalPublicationTitle">Publication' View</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('Pages.Publication.modal', ['publication'=>$publication])
            </div>
        </div>
    </div>
</div>
