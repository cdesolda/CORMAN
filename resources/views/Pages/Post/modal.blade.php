<!-- Modal EDIT Post in Group -->
<div class="modal fade" id="editPost {{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="editPost" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="editPost">Edit Post</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <form id="msform" action="{{route('posts.update',['id' => $post->id])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row align-items-center" style="margin-right: 2px; margin-left: 2px;">
                        <textarea class="form-control" rows="5" placeholder="Update your Post" id="post_update" name="post_update">{{$post->post_content}}</textarea>
                    </div>
                    <div class="row justify-content-center">
                        <div class="row col-lg-12" align="center" style="margin-top: 1em; display: inline-block;">
                            <!--<a href="#" id="btn-updatePost" class="btn btn-primary" role="button">Update</a>-->
                            <input type="submit" name="updatePost_button" class="btn btn-primary" dusk="UpdatePostButton" value="Update"/>
                            <p></p>
                            <!--<a href="#" id="btn-deletePost" class="btn btn-danger" role="button">Delete</a>-->
                            <a href="#" id="btn-deletePub" class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirmDeletePost {{$post->id}}" data-dismiss="modal" onclick="$('#editPost').modal('hide');">Delete</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CONFIRM DELETE POST -->
<div class="modal fade" id="confirmDeletePost {{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalPublicationTitle">Confirm Post Delete</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-lg-12" align="center">Really, do you want to delete this post?</div>
                </div>
                <form method="post" action="{{route('posts.destroy', $post->id)}}">
                    <div class="align-items-center" align="center">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm" dusk="btn-confirmDeletePost">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('input[name="updatePost_button"]').attr('disabled', true);
        $('input[name="post_update"],textarea').on('keyup', function () {
            var textarea_value = $("#post_update").val();
            if (textarea_value != '') {
                $('input[name="updatePost_button"]').attr('disabled', false);
            } else {
                $('input[name="updatePost_button"]').attr('disabled', true);
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
