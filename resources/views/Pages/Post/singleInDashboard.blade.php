<div class="row px-3">
    <div class="activity-container col-12 border border-primary p-2 my-2 my-rounded">
        <div class="activity-header mb-2 row">
            <div class="col-12">
                <div class="row px-3 pb-3">
                    <div class="p-0">
                        <img class="user-image" src="{{ url($activity['user']->picture_path) }}" alt="User avatar">
                    </div>
                    <div class="col p-0 pl-2">
                        <a href="{{ route('users.show', ['user'=>$activity['user']]) }}">{{ $activity['user']->first_name }} {{ $activity['user']->last_name }}</a>
                        <span> added a post in </span>
                        <a href="{{ route('groups.show', ['group'=>$activity['group']]) }}">{{ $activity['group']->name }}</a>
                        <br>
                        <span class="post-date textLighter">{{ smartDate($activity['post']->created_at) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="activity-content p-2 mb-2 border my-rounded">
                    {{ $activity['post']->post_content }}
                </div>
            </div>
            @if(count($activity['comments']) > 0)
                <div class="col-12">
                    <button class="myBtn pull-right" type="button" data-toggle="collapse" data-target="#post-comments-{{ $activity['post']->id }}"
                        aria-expanded="false" aria-controls="post-comments-{{ $activity['post']->id }}">
                        Comments: {{ count($activity['comments']) }}
                    </button>
                </div>
                <div class="col-12 mt-2">
                    <!-- Comments -->
                    <div class="collapse" id="post-comments-{{ $activity['post']->id }}">
                        @foreach($activity['comments'] as $comment)
                            <div class="comment-container">
                                <div class="col-12">
                                    <div class="row pb-3">
                                        <div class="p-0">
                                            <img class="user-image" src="{{ url($comment->user->picture_path) }}" alt="User avatar">
                                        </div>
                                        <div class="col p-0 p-2 mx-2 comment-content my-rounded">
                                            <a href="{{ route('users.show', ['user'=>$comment->user]) }}">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a>
                                            <br>
                                            <span class="post-date textLighter">{{ $comment->comment_content }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>