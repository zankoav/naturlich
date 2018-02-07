/**
 * Created by alexandrzanko on 2/7/18.
 */


export class ProductTemplates {

    static getProductTR(product) {
        return `<tr data-id="${product.id}" data-name="${product.name}">
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td><img src="${product.img_url}" width="100" height="75" alt=""></td>
                    <td><button class="btn btn-warning rounded-0 text-white"><i class="fas fa-edit"></i></button></td>
                    <td><button class="btn btn-danger rounded-0 text-white remove-product-button"
                        data-toggle="modal"
                        data-target="#removeProduct"
                        onclick="app.removeProduct(this);"><i class="fas fa-trash-alt"></i></button></td>
                </tr>`;
    }

    static loading() {
        return `<div class="loading">
                      <i class="fas fa-sync fa-spin fa-3x text-secondary"></i>
                </div>`;
    }
}