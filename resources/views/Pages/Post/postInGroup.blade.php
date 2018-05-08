<div class="publication_item col-lg-12" style="background-color: #EFF5FB;">
    <div class="row align-items-center">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11">
            <img src="{{url($post->user->picture_path)}}" style="border-radius: 50%;" width="30" height="30" alt="User Picture">
            Posted by: {{$post->user->first_name}} {{$post->user->last_name}} <span class="textLighter">{{smartDate($post->created_at)}}</span>
        </div>
        <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-1" align="right">
            @if($post->user->id === Auth::user()->id)
                <a href="#" id="btn-editPost" dusk="editPostButton" data-toggle="modal" data-target="#editPost {{$post->id}}"><i class="ion-edit"></i></a>
            @endif
        </div>
    </div>

    <hr>

    <!-- first row -->
    <div class="row">
        <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-11" data-toggle="modal">{{$post->post_content}}</div>
    </div>

    <hr>

    <!-- third row -->
    <div class="row align-items-center">
        @foreach($commentsList as $comment)
            @if($comment->post_group_id === $post->id)
                @include('Pages.Comment.commentInGroup', ['comment'=>$comment])
                @include('Pages.Comment.modal', ['comment'=>$comment, 'theGroup'=>$theGroup])
            @endif
        @endforeach
    </div>

    <p></p>

    <!-- second row -->
    <form id="msform" action="{{route('comments.store')}}" method="post">
        {{ csrf_field() }}
        <div class="row align-items-center">   
            <!-- nascondere bottoni per visitatori -->
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" style="display: inline-block;">
                <img src="{{url(Auth::user()->picture_path)}}" style="border-radius: 50%;" width="30" height="30" alt="User Picture">
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8" style="display: inline-block;">
                <textarea class="form-control" placeholder="Post a comment" id="comment_content{{$post->id}}" name="comment_content" rows="1"></textarea>
            </div>
            <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1" >
                <input type="submit" name="comment_button{{$post->id}}" dusk="commentButton" class="btn btn-primary" value="Comment" style="background-color: #228B22;"/>
                <input type="hidden" value="{{$post->id}}" name="postId" id="postId">
                <input type="hidden" value="{{$theGroup->id}}" name="groupId" id="groupId">
            </div>
        </div>
    </form>
</div>

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('input[name="comment_button{{$post->id}}"]').attr('disabled', true);
        $('input[name="comment_content{{$post->id}}"],textarea').on('keyup', function () {
            var textarea_value = $("#comment_content{{$post->id}}").val();
            if (textarea_value != '') {
                $('input[name="comment_button{{$post->id}}"]').attr('disabled', false);
            } else {
                $('input[name="comment_button{{$post->id}}"]').attr('disabled', true);
            }
        });
    });
</script>
