$(document).ready(function() {
  
    // Initialize selct2 components
    $('#authorsDropdown').select2({
        placeholder: "Type co-authors",
        maximumSelectionLength: 10,
        tags:true,
        tokenSeparators: [',']
    });

    $('#topicsDropdown').select2({
        placeholder: "Type publication topics",
        maximumSelectionLength: 7,
        tokenSeparators: [','],
        tags:true
    });


    var publicationId = window.location.href.split("/")[4] // hack to get group id
       
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'contentType': "application/json; charset=utf-8"
        }
    });

    $.getJSON("/ajaxPublicationInfo?id="+publicationId, function(data,status){
       
       console.log(data.topicList);
      
       $.each(data.topicList, function(index,value) {
            var newOption = new Option(value.name, value.id, false, true);
            $('#topicsDropdown').append(newOption);
        });
        console.log(data.memberList);
        $.each(data.authorList, function(index,value) {
            var newOption = new Option(value.name, value.id, false, true);
            $('#authorsDropdown').append(newOption);
        });
    });
});