$(document).ready(function () {

    $("#btn-share").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const requestURL = "/ajaxGetResearchGroupPublications";
        const table = $("#PublicationsTableContainer");
        const groupID = window.location.href.split("/")[4].split('?')[0]
        table.bootstrapTable({
            striped: true,
            search: true,
            showToggle: true,
            idField: "id",
            detailFilter: true,
            clickToSelect: true,

            // onCheck: function (row, $element) {
            //     // $($element.parent().parent().children()[2]).children().click()
            //     $($($element.parent().parent().children()[2]).children()).triggerHandler('click')
            //     return false;
            // },

            queryParams: function () {
                return {
                    researchGroupID: groupID
                }
            },


            url: requestURL,
            columns: [{
                field: 'selected',
                checkbox: true,
            }, {
                field: 'title',
                title: 'Title',
            }, {
                field: 'research_lines',
                title: 'Research Line',
                width: '340px',
                editable: {
                    type: 'checklist',
                    source: '/ajaxResearchLineInfo',
                    mode: 'inline',
                    onblur: 'submit',
                    showbuttons: true,
                    sourceOptions: {
                        data: {
                            id: groupID
                        }
                    },
                    params: function(params) {
                        //originally params contain pk, name and value
                        console.log(params);
                        return params;
                    }
                }
            }
        ],
        });

        table.on('check.bs.table', function (e, row, $element) {
            //Sarebbe bello trovare un modo per aprire le checkbox delle linee di ricerca al click
            
            // e.stopPropagation();
            // e.preventDefault();
            // $($($element.parent().parent().children()[2]).children()).triggerHandler('show');
            
        });

        //send to corman publications to post
        $('#addTo').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var shareData = {
                publicationList: table.bootstrapTable('getSelections'),
                groupId: window.location.href.split("/")[4].split('?')[0] // hack to get group id
            }

            
            console.log(shareData);

            $.ajax({
                type: "POST",
                url: "/researchGroupShare",
                data: JSON.stringify(shareData),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data, status) {
                    $("#addPublication").modal('toggle');
                    $("#confirmAddPublication").modal('toggle');
                    //window.location.href = data.redirectTo;                  
                }
            });
        });
    });


    //send to corman group id to leave
    $('#yesLeaveGroup').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var shareData = {
            groupID: window.location.href.split("/")[4].split('?')[0] // hack to get group id
        }
        console.log(shareData);

        $.ajax({
            type: "POST",
            url: "/leave",
            data: JSON.stringify(shareData),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data, status) {
                window.location.href = data.redirectTo;
            }
        });
    });

    $('#noLeaveGroup').click(function () {

        $('#exitGroup').modal('toggle');
    });
});