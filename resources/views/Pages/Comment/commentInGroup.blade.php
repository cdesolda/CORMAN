<div class="publication_item col-lg-12" style="background-color: white;">
    <div class="row align-items-center">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" style="font-size: 0.9em;">
            <img src="{{url($comment->user->picture_path)}}" style="border-radius: 50%;" width="30" height="30" alt="User Picture">
            <strong>{{$comment->user->first_name}} {{$comment->user->last_name}}</strong> {{$comment->comment_content}} <span class="textLighter">{{smartDate($comment->created_at)}}</span>
        </div>
        <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1" align="right">
            @if($comment->user->id === Auth::user()->id)
                <a href="#" id="btn-editComment" dusk="editCommentButton" data-toggle="modal" data-target="#editComment {{$comment->id}}"><i class="ion-edit" style="font-size: 1.6em;"></i></a>
            @endif
        </div>
    </div>

    <!-- first row 
    <div class="row">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" data-toggle="modal">{{$comment->comment_content}}</div>
    </div>-->
</div>
