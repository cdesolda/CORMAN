$(document).ready(function() {
    // Initialize selct2 components
    $('#usersDropdown').select2({
        placeholder: "invite members"
    });

    $('#researchLinesDropdown').select2({
        placeholder: "add research lines",
        tags:true
    });
    $('#officesDropdown').select2({
        placeholder: "add offices",
        tags:true
    });
});