<!-- Modal EDIT Comment in Group -->
<div class="modal fade" id="editComment {{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="editComment " aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="editPost">Edit Comment</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <form id="msform" action="{{route('comments.update',['id' => $comment->id])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row align-items-center" style="margin-right: 2px; margin-left: 2px;">
                        <textarea class="form-control" rows="5" placeholder="Update your Post" id="comment_update" name="comment_update">{{$comment->comment_content}}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <div class="row col-lg-12" align="center" style="margin-top: 1em; display: inline-block;">
                            <!--<a href="#" id="btn-updatePost" class="btn btn-primary" role="button">Update</a>-->
                            <input type="submit" name="updateComment_button" class="btn btn-primary" value="Update"/>
                            <p></p>
                            <!--<a href="#" id="btn-deletePost" class="btn btn-danger" role="button">Delete</a>-->
                            <a href="#" id="btn-deletePub" class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirmDeleteComment {{$comment->id}}" data-dismiss="modal" onclick="$('#editComment').modal('hide');">Delete</a>
                            <input type="hidden" value="{{$theGroup->id}}" name="groupId" id="groupId">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CONFIRM DELETE POST -->
<div class="modal fade" id="confirmDeleteComment {{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalPublicationTitle">Confirm Comment Delete</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-lg-12" align="center">Really, do you want to delete this comment?</div>
                </div>
                <form method="post" action="{{route('comments.destroy', ['id' => $comment->id])}}">
                    <div class="align-items-center" align="center">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm" dusk="btn-confirmDeleteComment">Yes, Delete</button>
                        <input type="hidden" value="{{$theGroup->id}}" name="groupId" id="groupId">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('input[name="updateComment_button"]').attr('disabled', true);
        $('input[name="comment_update"],textarea').on('keyup', function () {
            var textarea_value = $("#comment_update").val();
            if (textarea_value != '') {
                $('input[name="updateComment_button"]').attr('disabled', false);
            } else {
                $('input[name="updateComment_button"]').attr('disabled', true);
            }
        });
    });
</script>
<!--<script>
        $(document).ready(function() {

            $("a#btn-updatePost").addClass("disabled");

            $("textarea#post_update").on("input", function() {
                if ($("textarea#post_update").val())
                    $("a#btn-updatePost").removeClass("disabled");
                else
                    $("a#btn-updatePost").addClass("disabled");
            });

        });
</script>

<script>
    $(document).ready(function () {
        $('input[type="submit"]').attr('disabled', true);
        $('input[type="text"],textarea').on('keyup', function () {
            var textarea_value = $("#post_update").val();
            if (textarea_value != '') {
                $('input[type="submit"]').attr('disabled', false);
            } else {
                $('input[type="submit"]').attr('disabled', true);
            }
        });
    });
</script>-->
