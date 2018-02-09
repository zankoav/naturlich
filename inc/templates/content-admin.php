<?php
global $productPage;
$currentImage = $productPage->themeUrl . '/img/no-image.png';
$products = $productPage->getTableHelper()->selectAllReverse();
?>

<div class="wrap">
    <div class="row">
        <div class="col-12 col-md-8">
            <header class="d-flex py-3">
                <h3><?php echo get_admin_page_title() ?></h3>
                <button class="btn btn-info btn-sm rounded-0 ml-3" type="button" data-toggle="collapse"
                        data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                    Add Product
                </button>
            </header>
            <!-- Large modal -->
            <div class="collapse " id="collapseExample">
                <div class="product-content p-4 bg-light border border-info">
                    <form id="add-product-form">
                        <div class="form-group">
                            <label for="product-name">Product name</label>
                            <input type="text"
                                   class="form-control rounded-0"
                                   id="product-name"
                                   aria-describedby="emailHelp"
                                   placeholder="Product name"
                                   name="name">
                            <small class="form-text text-muted">
                                Enter new product name
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="product-description">Product description</label>
                            <textarea
                                    class="form-control rounded-0"
                                    id="product-description"
                                    placeholder="Product description"
                                    rows="3"
                                    name="description"></textarea>
                            <small class="form-text text-muted">
                                Enter new product description
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Product image</label>
                            <div class="card-group">
                                <div class="card rounded-0 p-0 m-0">
                                    <img class="card-img-top rounded-0 product-image" src="<?php echo $currentImage; ?>"
                                         data-src="<?php echo $currentImage; ?>" alt="Card image cap">
                                    <div class="row p-0 m-0">
                                        <button type="button" class="col-9 btn btn-sm btn-info rounded-0 load-image">
                                            Load image
                                        </button>
                                        <button type="button"
                                                class="col-3 btn btn-sm btn-warning rounded-0 clear-image">
                                            <i class="fas fa-times text-white"></i>
                                        </button>
                                        <input type="hidden" class="input-product-image" name="img_url">
                                    </div>
                                </div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                            </div>
                            <small class="form-text text-muted">
                                Choose image for product
                            </small>
                        </div>
                        <div class="row my-2 mx-0 flex-nowrap">
                            <div id="message-alert" class="col-8  alert alert-danger invisible rounded-0 mb-0"
                                 role="alert"></div>
                            <button type="button"
                                    class="ml-sm-auto col-sm-auto btn btn-success rounded-0"
                                    onclick="app.createProduct();">
                                <i id="spinner" class="fas fa-sync fa-spin"></i>
                                Create
                            </button>
                            <button id="close-product" type="button"
                                    class="col-sm-auto close-product btn btn-outline-info rounded-0 ml-2">
                                Close
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <smal class="mt-3 d-block">All products</smal>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Edite</th>
            <th scope="col">Remove</th>
        </tr>
        </thead>
        <tbody id="products-table-body">
        <?php foreach ($products as $product) { ?>
            <tr data-id="<?php echo $product['id']; ?>"
                data-name="<?php echo $product['name']; ?>">
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>
                    <img src="<?php echo $product['img_url']; ?>" width="100" height="75" alt="">
                </td>
                <td>
                    <button class="btn btn-warning rounded-0 text-white"
                            onclick="app.editProduct(this);"
                            data-toggle="modal"
                            data-target=".bd-remove-modal-lg"><i class="fas fa-edit"></i></button>
                </td>
                <td>
                    <button class="btn btn-danger rounded-0 text-white remove-product-button"
                            data-toggle="modal"
                            data-target="#removeProduct"
                            onclick="app.removeProduct(this);">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- Modal remove product -->
    <div class="modal fade" id="removeProduct" tabindex="-1" role="dialog" aria-labelledby="removeProductLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeProductLabel">Remove product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove the product <strong></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button"
                            class="btn btn-danger confirm-remove-product"
                            onclick="app.confirmRemoveProduct(this);">
                        <i id="spinner" class="fas fa-sync fa-spin"></i>
                        <i id="spinner-remove" class="fas fa-sync fa-spin"></i>
                        <span>Remove</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit product -->
    <div id="editProduct" class="modal fade bd-remove-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form">
                        <div class="form-group">
                            <label for="edit-product-name">Product name</label>
                            <input type="text"
                                   class="form-control rounded-0"
                                   id="edit-product-name"
                                   aria-describedby="emailHelp"
                                   placeholder="Product name"
                                   name="name">
                            <small class="form-text text-muted">
                                Enter new product name
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="edit-product-description">Product description</label>
                            <textarea
                                    class="form-control rounded-0"
                                    id="edit-product-description"
                                    placeholder="Product description"
                                    rows="3"
                                    name="description"></textarea>
                            <small class="form-text text-muted">
                                Enter new product description
                            </small>
                        </div>
                        <div class="form-group">
                            <label>Product image</label>
                            <div class="card-group">
                                <div class="card rounded-0 p-0 m-0">
                                    <img id="edit-product-image" class="card-img-top rounded-0"
                                         src="<?php echo $currentImage; ?>"
                                         data-src="<?php echo $currentImage; ?>" alt="Card image cap">
                                    <div class="row p-0 m-0">
                                        <button id="edit-load-image" type="button"
                                                class="col-9 btn btn-sm btn-info rounded-0 load-image">
                                            Load image
                                        </button>
                                        <button id="edit-clear-image" type="button"
                                                class="col-3 btn btn-sm btn-warning rounded-0">
                                            <i class="fas fa-times text-white"></i>
                                        </button>

                                        <input id="edit-product-image-url" type="hidden" class="input-product-image"
                                               name="img_url">
                                        <input id="edit-product-id" type="hidden" class="input-product-image" name="id">
                                    </div>
                                </div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                            </div>
                            <small class="form-text text-muted">
                                Choose image for product
                            </small>
                        </div>
                        <div class="row my-2 mx-0 flex-nowrap">
                            <div id="message-alert" class="col-8  alert alert-danger invisible rounded-0 mb-0"
                                 role="alert"></div>
                            <button type="button"
                                    class="ml-sm-auto col-sm-auto btn btn-warning rounded-0 text-white"
                                    onclick="app.confirmEditProduct(this);">
                                <i id="spinner" class="fas fa-sync fa-spin"></i>
                                Edit
                            </button>
                            <button type="button"
                                    class="col-sm-auto btn btn-outline-info rounded-0 ml-2"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


