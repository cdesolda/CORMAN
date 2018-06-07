$(document).ready(function() {
    // Initialize selct2 components
    $('#usersDropdown').select2({
        placeholder: "invite members",
    });

    $('#adminsDropdown').select2({
        placeholder: "invite admins",
    });

    $('#researchLinesDropdown').select2({
        placeholder: "add research lines to your group",
        tags:true
    });
    $('#officesDropdown').select2({
        placeholder: "add offices to your group",
        tags:true
    });

    var groupId = window.location.href.split("/")[4] // hack to get group id
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          'contentType': "application/json; charset=utf-8"
        }
    });

    $.getJSON("/ajaxResearchGroupInfo?id="+groupId, function(data,status){
       $.each(data.researchLinesList, function(index,value) {
            var newOption = new Option(value.name, value.id, false, true);
            $('#researchLinesDropdown').append(newOption);
        });
       $.each(data.officesList, function(index,value) {
            var newOption = new Option(value.address, value.id, false, true);
            $('#officesDropdown').append(newOption);
        });
        $.each(data.memberList, function(index,value) {
            var name = value.last_name+" " +value.first_name;
            name = data.pendingList.includes(value.id) ? '(Pending) ' + name : name;
            var newOption = new Option(name, value.id, false, true);
            $('#usersDropdown').append(newOption);
        });
        $.each(data.adminsList, function(index,value) {
            var newOption = new Option(value.last_name+" " +value.first_name, value.id, false, true);
            $('#adminsDropdown').append(newOption);
        });
    });
});
