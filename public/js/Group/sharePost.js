$(document).ready(function(){

	$("#btn-post").click(function(){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var post_content = $('textarea#post_content').val();
        var postData = {
            post_content: post_content,
            groupId: window.location.href.split("/")[4] // hack to get group id
        }
        
        console.log(postData);

        $.ajax({
            type: "POST",
            url: "/posts",
            data: JSON.stringify(postData),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data, status){
            $("#addPost").modal('toggle');
                //window.location.href = data.redirectTo;                  
            }
        });
    });
});