function search() {
    const query = $("#searchQuery").val();
    window.location.href = window.location.href.split("/").slice(0,3).join('/') + '/researchGroups?q=' + query;
}

$(document).ready(function () {

    $("#searchButton").click(function (event) {
        event.preventDefault()
        search()
    })

    $("#searchQuery").on('keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            search()
        }
    });

})