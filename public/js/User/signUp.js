$(document).ready(function() {
    // Initialize selct2 components
    $('#affiliationDropdown').select2({
        placeholder: "Type your affiliation*",
        tags:true
    });

    $('#topicsDropdown').select2({
        placeholder: "Type your research area*",
        maximumSelectionLength: 5,
        tags:true
    });

});
