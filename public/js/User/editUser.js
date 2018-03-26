$(document).ready(function () {
    var disabledState = true;

    $('input.editable-field').prop('readonly', true)
    $('input.editable-field').addClass('disabled')

    $('input.button').val('Edit')

    $('a.edit').on('click', function (e) {
        e.preventDefault(); // Prevent browser refresh
        // Check to see if input is disabled or not...
        $(this).hide();
        $(this).next('a.save').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', false);
        $(this).closest('.form-group').find('.editable-field').removeClass('disabled');
        $(this).closest('.form-group').find('.editable-field').focus();

    })

    $('a.save').on('click', function (e) {
        e.preventDefault(); // Prevent browser refresh
        $(this).hide();
        $(this).prev('a.edit').show();
        $(this).closest('.form-group').find('.editable-field').prop('readonly', true);
        $(this).closest('.form-group').find('.editable-field').addClass('disabled');
        disabledState = true;

    })

    $('#roleDropdown').select2({
        placeholder: "Change your role",
        maximumSelectionLength: 1,
    });

    $('#affiliationDropdown').select2({
        placeholder: "Cahnge your affiliation",
        maximumSelectionLength: 1,
        tags: true
    });

    $('#topicsDropdown').select2({
        placeholder: "Change your area of interests",
        maximumSelectionLength: 7,
        tokenSeparators: [','],
        tags:true
    });

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'contentType': "application/json; charset=utf-8"
        }
    });

    $.getJSON("/ajaxUserInfo", function(data,status){
        
        console.log(data.topicList);
    
        $.each(data.topicList, function(index,value) {
            var newOption = new Option(value.name, value.id, false, true);
            $('#topicsDropdown').append(newOption);
        });
        var role = new Option(data.role.name, data.role.id, false, true);
        $('#roleDropdown').append(role);

        var affiliation = new Option(data.affiliation.name, data.affiliation.id, false, true);
        $('#affiliationDropdown').append(affiliation);
       
    });
});
