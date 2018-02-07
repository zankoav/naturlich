/**
 * Created by alexandrzanko on 2/1/18.
 */
import {ProductHelper} from './moduls/admin/ProductHelper.js';

let product;

jQuery(document).ready(function ($) {
    product = new ProductHelper();
});

export function createProduct() {
    product.create();
}

export function editProduct(element) {
    product.edit(element);
}

export function confirmEditProduct(element) {
    product.confirmEdit(element);
}

export function removeProduct(element) {
    product.remove(element);
}

export function confirmRemoveProduct(element) {
    product.confirmRemove(element);
}

