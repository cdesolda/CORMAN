$(document).ready(function() {
    // Initialize selct2 components
    $('#usersDropdown').select2({
        placeholder: "invite members",
        maximumSelectionLength: 10,
    });

    $('#topicsDropdown').select2({
        placeholder: "add topics to your group",
        maximumSelectionLength: 5,
        tags:true
    });
});