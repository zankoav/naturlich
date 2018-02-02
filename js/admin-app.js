/**
 * Created by alexandrzanko on 2/1/18.
 */
jQuery(document).ready(function ($) {


    $('.create-product').click(function () {
        var name = $.trim($("#product-name").val());
        if (name.length > 0) {
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: $('#add-product-form').serialize(),
                dataType: 'json',
                beforeSend: function(){
                    hideMessageAddProduct();
                    $('#spinner').css({
                        opacity: 0,
                        display: 'inline-block'
                    }).animate({opacity:1},600);
                },
                success: function (data) {
                    $('#spinner').fadeOut();
                    showRequestAlert(data);
                    if(data.status == 'success'){
                        addProductOnScreen(data.product);

                    }
                },
                error: function () {
                    $('#spinner').fadeOut();
                    showRequestAlert(null);
                }
            });
        }else{
            showErrorAddProductAlert('Product name is require');
        }
    });

    /*
     * действие при нажатии на кнопку загрузки изображения
     * вы также можете привязать это действие к клику по самому изображению
     */
    $('.load-image').click(function () {
        let img = $('.product-image');
        wp.media.editor.send.attachment = function (props, attachment) {
            img.attr('src', attachment.url);
            $('.input-product-image').attr('value', attachment.url);
        }
        wp.media.editor.open($(this));
    });
    /*
     * удаляем значение произвольного поля
     * если быть точным, то мы просто удаляем value у input type="hidden"
     */
    $('.clear-image').click(function () {
        let img = $('.product-image');
        img.attr('src', img.attr('data-src'));
        $('.input-product-image').attr('value', '');
    });

    function showRequestAlert(data) {
        if (data) {
            let code = data.status;
            switch (code) {
                case 1 :
                    showErrorAddProductAlert('This name exist');
                    break;
                case 'success':
                    showSuccessAddProductAlert('Product add successful');
                    break;
                default:
                    showErrorAddProductAlert('Server error');
                    break;
            }
        } else {
            showErrorAddProductAlert('Server error');
        }
    }

    function showSuccessAddProductAlert(message) {
        showMessageAddProduct(message, true);
    }

    function showErrorAddProductAlert(message) {
        showMessageAddProduct(message, false);
    }

    function showMessageAddProduct(message, isSuccess) {
        let alertClass = isSuccess ? 'col-8 mr-sm-auto alert alert-success rounded-0 mb-0' : 'col-8 mr-sm-auto alert alert-danger rounded-0 mb-0';
        $('#message-alert').attr('class', alertClass).html(message);
    }

    function hideMessageAddProduct() {
        $('#message-alert').attr('class', 'col-8 mr-sm-auto alert alert-danger invisible rounded-0 mb-0');
    }

    function addProductOnScreen(product){
        if(product){
            $("#products-table-body").prepend(
                '<tr>' +
                    `<td>${product.name}</td>` +
                    `<td>${product.description}</td>` +
                    `<td><img src="${product.img_url}" width="100" height="75" alt=""></td>` +
                '</tr>'
            );
        }
    }

});