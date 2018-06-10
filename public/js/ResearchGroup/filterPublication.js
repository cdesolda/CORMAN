$(document).ready(function () {

    $("#btn-filter").click(function () {

        const toggles = $('[data-toggle=toggle]')

        toggles.each(function (index,myToggle) { 
            $(myToggle.id).bootstrapToggle();
        });

        $('#apply-button').click ( function(){
            const groupID = window.location.href.split("/")[4].split('?')[0];
            const toggleInputs = $('input[data-toggle=toggle]');
            let authorsID = toggleInputs.filter(function (idx,toggle) {
                return toggle.checked && toggle.id.includes('researcher');
            }).map(function (idx, toggle) {
                return toggle.id.split('-')[2];
            }).toArray();
            authorsID =  authorsID.length != toggleInputs.toArray().length ? authorsID : [];

            let queryParam = $.param({author: authorsID});
            queryParam = queryParam.length > 0 ? '?' + queryParam : ''

            window.location.href = window.location.origin + '/researchGroups/' + groupID + queryParam;
        });
    });
});