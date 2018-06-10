function getURLParam(key,target){
    var values = [];
    if (!target) target = decodeURIComponent(location.search);

    key = key.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");

    var pattern = key + '=([^&#]+)';
    var o_reg = new RegExp(pattern,'ig');
    while (true){
        var matches = o_reg.exec(target);
        if (matches && matches[1]){
            values.push(matches[1]);
        } else {
            break;
        }
    }

    if (!values.length){
        return null;   
    } else {
        return values.length == 1 ? values[0] : values;
    }
}

function getCheckedIDforKey(key, toggleInputs) {
    const filteredInputs = toggleInputs.filter(function (idx,toggle) {
        return toggle.checked && toggle.id.includes(key);
    });
    const arr =  filteredInputs.map(function (idx, toggle) {
        return toggle.id.split('-')[2];
    }).toArray();
    if (filteredInputs.toArray().length == 0) {
        return [-1];
    } else if (arr.length == filteredInputs.toArray().length) {
        return [];
    }  else {
        return arr
    }
    // return arr.length != filteredInputs.toArray().length ? arr : []
}

function getSelectValueExcludingDefault(defaultValue, selectID) {
    const filter = $('#'+selectID)[0].value
    if (filter != defaultValue) {
        return filter
    }
}

function setEnabledForKey(key, enabled) {
    $('[data-toggle=toggle]').filter(function (idx,toggle) {
        return toggle.id.includes(key);
    }).each(function (idx, toggle) {
        const isEnabled = enabled.includes('\b' + toggle.id.split('-')[2] + '\b');
        $(toggle).bootstrapToggle(isEnabled ? 'on' : 'off');
    })
}

function setSelectValue(selectID, value) {
    $('#'+selectID).val(value).change();
}

function setFilters() {
    const urlParams = {
        author: getURLParam('author[]'),
        research_lines: getURLParam('research_lines[]'),
        type: getURLParam('type'),
        date: getURLParam('date'),
    }
    if (urlParams.author) {
        setEnabledForKey('researcher', urlParams.author)
    }
    if (urlParams.research_lines) {
        setEnabledForKey('researchLine', urlParams.research_lines)
    }
    if (urlParams.type) {
        setSelectValue('type-select', urlParams.type)
    }
    if (urlParams.date) {
        setSelectValue('date-sorting-select', urlParams.date)
    }
}

$(document).ready(function () {

    $("#btn-filter").click(function () {

        const toggles = $('[data-toggle=toggle]')

        toggles.each(function (index,myToggle) { 
            $(myToggle.id).bootstrapToggle();
        });

        setFilters();

        $('#apply-button').click ( function(){

            let queryObj = {}

            const groupID = window.location.href.split("/")[4].split('?')[0];
            
            const toggleInputs = $('input[data-toggle=toggle]');

            queryObj.author = getCheckedIDforKey('researcher', toggleInputs);
            queryObj.research_lines = getCheckedIDforKey('researchLine', toggleInputs);

            const typeFilter = getSelectValueExcludingDefault('all', 'type-select')
            if (typeFilter) {
                queryObj.type = typeFilter
            }

            const dateSorting = getSelectValueExcludingDefault('desc', 'date-sorting-select')
            if (dateSorting) {
                queryObj.date = dateSorting
            }


            let queryParam = $.param(queryObj);
            queryParam = queryParam.length > 0 ? '?' + queryParam : '';

            window.location.href = window.location.origin + '/researchGroups/' + groupID + queryParam;
        });
    });
});