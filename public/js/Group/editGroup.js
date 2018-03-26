$(document).ready(function() {
    // Initialize selct2 components
    $('#usersDropdown').select2({
        placeholder: "invite members",
    });

    $('#topicsDropdown').select2({
        placeholder: "add topics to your group",
        maximumSelectionLength: 7,
        tags:true
    });

    var groupId = window.location.href.split("/")[4] // hack to get group id
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'contentType': "application/json; charset=utf-8"
        }
    });

    $.getJSON("/ajaxGroupInfo?id="+groupId, function(data,status){

       console.log(data.topicList);

       $.each(data.topicList, function(index,value) {
            var newOption = new Option(value.name, value.id, false, true);
            $('#topicsDropdown').append(newOption);
        });
        console.log(data.memberList);
        $.each(data.memberList, function(index,value) {
            var newOption = new Option(value.last_name+" " +value.first_name, value.id, false, true);
            $('#usersDropdown').append(newOption);
        });
    });
});
