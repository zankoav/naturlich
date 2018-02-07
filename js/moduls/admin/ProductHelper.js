/**
 * Created by alexandrzanko on 2/7/18.
 */

import {AjaxHelper} from '../base/AjaxHelper.js';
import {Routing} from '../base/Routing.js';
import {ProductTemplates} from './ProductTemplates.js';
import {Utils} from '../base/Utils';

export class ProductHelper {

    constructor() {
        self = this;
        this.rout = new Routing();
        this.ajax = new AjaxHelper();
        $('.clear-image').click(this.clearImage);
        $('.load-image').click(this.getImage);
        $('#edit-clear-image').click(this.clearEditImage);
        $('#edit-load-image').click(this.getEditImage);
        $('#close-product').click(this.hideCollapseForm);
    }

    edit(element) {
        let tr = $(element).parent().parent();
        let id = $(tr).attr('data-id');
        this.ajax.wp_post_data(
            this.rout.getProductById(),
            {'id': id},
            this.beforeLoad,
            this.successLoad,
            this.errorLoad
        );
    }

    beforeLoad() {
        $('#edit-product-form').append(ProductTemplates.loading());
    }

    successLoad(response) {
        setTimeout(() => {
            self.pullEditForm(response.product);
            $('#edit-product-form .loading').fadeOut();
        }, 200);
    }

    errorLoad() {
        alert('error');
    }

    pullEditForm(product) {
        $('#edit-product-name').val(product.name);
        $('#edit-product-description').val(product.description);
        $('#edit-product-image-url').val(product.img_url);
        $('#edit-product-id').val(product.id);
        $('#edit-product-image').attr('src', product.img_url);
    }

    confirmEdit() {
        let name = $.trim($("#edit-product-name").val());
        if (name.length > 0) {
            this.ajax.wp_post_data(
                this.rout.editProduct(),
                Utils.objectifyForm($('#edit-product-form').serializeArray()),
                this.beforeEdit,
                this.successEdit,
                this.errorEdit
            );
        } else {
            alert('Product name is require');
        }
    }

    beforeEdit() {
        $('#edit-product-form #spinner').css({
            opacity: 0,
            display: 'inline-block'
        }).animate({opacity: 1}, 600);
    }

    successEdit(response) {
        $('#edit-product-form #spinner').fadeOut();
        // self.showRequestAlert(response);
        if (response.status == 'success') {
            self.updateProduct(response.product);
            alert('Successful');
        } else if (response.status == 1) {
            alert('Nothing edited');
        } else {
            alert('Server error');
        }
    }

    errorEdit() {
        $('#edit-product-form #spinner').fadeOut();
        alert('Server error');
    }

    updateProduct(product) {
        let tr = $(`tr[data-id=${product.id}]`);
        tr.children('td').eq(0).html(product.name);
        tr.children('td').eq(1).html(product.description);
        tr.children('td').eq(2).children('img').attr('src', product.img_url);
    }


    create() {
        let name = $.trim($("#product-name").val());
        if (name.length > 0) {
            this.ajax.wp_post_data(
                this.rout.createProduct(),
                Utils.objectifyForm($('#add-product-form').serializeArray()),
                this.beforeCreating,
                this.successCreating,
                this.errorCreating
            );
        } else {
            $('#product-name').css({
                'border-color': '#f5c6cb',
                'background-color': '#f8d7da'
            });
            this.showErrorAddProductAlert('Product name is require');
        }
    }

    beforeCreating() {
        self.hideMessageAddProduct();
        $('#spinner').css({
            opacity: 0,
            display: 'inline-block'
        }).animate({opacity: 1}, 600);
    }

    successCreating(response) {
        $('#spinner').fadeOut();
        self.showRequestAlert(response);
        if (response.status == 'success') {
            self.addProductOnScreen(response.product);
            $('#add-product-form')[0].reset();
            $('#product-name').removeAttr('style');
            self.clearImage();
        }
    }

    errorCreating() {
        $('#spinner').fadeOut();
        self.showRequestAlert(null);
    }

    hideCollapseForm() {
        $('#collapseExample').collapse('hide');
    }

    getImage() {
        let img = $('.product-image');
        wp.media.editor.send.attachment = function (props, attachment) {
            img.attr('src', attachment.url);
            $('.input-product-image').attr('value', attachment.url);
        }
        wp.media.editor.open($(this));
    }

    getEditImage() {
        let img = $('#edit-product-image');
        wp.media.editor.send.attachment = function (props, attachment) {
            img.attr('src', attachment.url);
            $('#edit-product-image-url').attr('value', attachment.url);
        }
        wp.media.editor.open($(this));
    }

    clearImage() {
        let img = $('.product-image');
        img.attr('src', img.attr('data-src'));
        $('.input-product-image').attr('value', '');
    }

    clearEditImage() {
        let img = $('#edit-product-image');
        img.attr('src', img.attr('data-src'));
        $('#edit-product-image-url').attr('value', '');
    }

    addProductOnScreen(product) {
        $("#products-table-body").prepend(ProductTemplates.getProductTR(product));
    }

    hideEditModal() {

    }

    showRequestAlert(data) {
        if (data) {
            let code = data.status;
            switch (code) {
                case 1 :
                    this.showErrorAddProductAlert('This name exist');
                    break;
                case 'success':
                    this.showSuccessAddProductAlert('Product add successful');
                    break;
                default:
                    this.showErrorAddProductAlert('Server error');
                    break;
            }
        } else {
            this.showErrorAddProductAlert('Server error');
        }
    }

    showSuccessAddProductAlert(message) {
        this.showMessageAddProduct(message, true);
    }

    showErrorAddProductAlert(message) {
        this.showMessageAddProduct(message, false);

    }

    showMessageAddProduct(message, isSuccess) {
        let alertClass = isSuccess ?
            'col-8 mr-sm-auto alert alert-success rounded-0 mb-0' :
            'col-8 mr-sm-auto alert alert-danger rounded-0 mb-0';
        $('#message-alert').attr('class', alertClass).html(message);
    }

    hideMessageAddProduct() {
        $('#message-alert').attr('class', 'col-8 mr-sm-auto alert alert-danger invisible rounded-0 mb-0');
    }

    remove(element) {
        let tr = $(element).parent().parent();
        let id = $(tr).attr('data-id');
        let name = $(tr).attr('data-name');
        $('#removeProduct .modal-body strong').html(name);
        $('#removeProduct .confirm-remove-product').attr('data-remove-id', id);
    }

    confirmRemove(element) {
        let id = $(element).attr('data-remove-id');
        this.ajax.wp_post_data(this.rout.removeProduct(), {'id': id},
            () => {
                $('#spinner-remove').css({
                    opacity: 0,
                    display: 'inline-block'
                }).animate({opacity: 1}, 600);
            },
            (response) => {
                $('#spinner-remove').fadeOut();
                setTimeout(function () {
                    $('.confirm-remove-product span').html('Removed');
                    setTimeout(function () {
                        $('#removeProduct').modal('hide');
                        $('.confirm-remove-product span').html('Remove');
                        $(`tr[data-id=${response.id}]`).fadeOut();
                    }, 600);
                }, 300);
            });
    }
}