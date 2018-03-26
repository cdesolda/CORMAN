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
        maximumSelectionLength: 5,
        tokenSeparators: [','],
        tags:true
    });
});