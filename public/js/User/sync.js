$(document).ready(function(){
    // Syncronize publications
    $('#progBar').hide();
    var firstName = $('#first_name').text().split(' ').join('_');
    var lastName = $('#last_name').text().split(' ').join('_');
    console.log(firstName +"             "+ lastName);
    var queryString = "first_name="+firstName+"&"+"last_name="+lastName;
    var requestURL = "syncDBLP?"+ queryString;

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#table').bootstrapTable({
        striped: true,
        search: true,
        showToggle: true,
        height:600,
        detailFilter: true,
        clickToSelect: true,
       
        
        url: requestURL,
        columns: [{
            field: 'id',
            checkbox: true,
        }, {
            field: 'title',
            title: 'Title',
            width: '40%',
        }, {
            field: 'authors',
            title: 'Authors'
        },{
            field: 'venue',
            title: 'Venue'
        }],
    });

    //send to DB
    $('#addTo').click ( function(){
        var selectionData = JSON.stringify($('#table').bootstrapTable('getSelections'));
        console.log(selectionData),
        $('#progBar').show();
        $.ajax({
            type: "POST",
            url: "syncToCorman",
            data: selectionData,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data, status){
                $('#messageModal').modal('show');
                $('#progBar').hide();
                //alert(data.message); //TODO  replace with modal
                //window.location.href = data.redirectTo;
            },
        });
    });
});
