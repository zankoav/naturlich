/**
 * Created by alexandrzanko on 2/13/18.
 */

export function filters($) {

    let check = false;

    $('#product-filter').find('input[type="checkbox"]').click(send);
    $('#sortSelect').on('change', send);

    function send() {
        if (!check){
            let url = window.location.origin + window.location.pathname;
            let filterQuery = getFilterQuery();
            let sortQuery = getSortQuery(filterQuery);
            url += filterQuery;
            url += sortQuery;
            window.location.replace(url);
        }
        check = true;
    }

    function getSortQuery(filterQ){
        let query = '';
        let sort = $('#sortSelect').val();
        if (sort != 0 && filterQ != ''){
            query += "&sorted_by=" + sort;
        }else if (sort != 0 && filterQ == ''){
            query += "?sorted_by=" + sort;
        }
        return query;
    }

    function getFilterQuery() {
        let filter = [];
        let inputs = $('#product-filter input');
        for (let i = 0; i < inputs.length; i++) {
            if ($(inputs[i]).is(':checked')) {
                filter.push($(inputs[i]).attr('id'));
            }
        }
        let filterQuery = filter.join(',');
        if (filterQuery != '') {
            filterQuery = '?filter=' + filterQuery;
        }
        return filterQuery;
    }


}