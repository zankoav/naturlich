/**
 * Created by alexandrzanko on 2/7/18.
 */
export class AjaxHelper {

    wp_post_data(action,
                 data,
                 beforeSend = function () {
                     console.log('beforeSend');
                 },
                 success = function (request) {
                     console.log('success');
                     console.log(request);
                 },
                 error = function () {
                     console.log('error');

                 }) {
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {'action': action, data: data},
            dataType: 'json',
            beforeSend: beforeSend,
            success: success,
            error: error
        });
    }
}