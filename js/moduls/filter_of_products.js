/**
 * Created by alexandrzanko on 2/13/18.
 */

export function productsFilter() {

    jQuery(document).ready(function ($) {

        $('#product-filter').find('input[type="checkbox"]').click(send);
        $('#product-filter').find('select').on('change', send);

        function send() {
            let query = '?' + $('#product-filter').serialize();
            let base = window.location.protocol + '//' + window.location.host + window.location.pathname;
            window.location.replace(base + query);
        }

    });

}