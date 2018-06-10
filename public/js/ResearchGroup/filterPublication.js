$(document).ready(function () {

    $("#btn-share").click(function () {

        let toggles = $('[data-toggle=toggle]').each(function (index,myToggle) { 
            $(myToggle.id).bootstrapToggle();
        });

        // $('#doTheFilter').click ( function(){
        //     $.ajaxSetup({
        //         headers: {
        //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var shareData = {
        //         groupID: window.location.href.split("/")[4] // hack to get group id
        //     }
        //     console.log(shareData);

        //     $.ajax({
        //         type: "POST",
        //         url: "/leave",
        //         data: JSON.stringify(shareData),
        //         contentType: "application/json; charset=utf-8",
        //         dataType: "json",
        //         success: function(data, status){
        //             window.location.href = data.redirectTo;                  
        //         }
        //     });
        // });
    });
});