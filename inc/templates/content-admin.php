<?php
global $productPage;
$currentImage = $productPage->themeUrl . '/img/no-image.png';
$products = $productPage->getTableHelper()->selectAll();
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
                                        <input type="hidden" class="input-product-image" name="image">
                                        <input type="hidden" name="action" value="add_product">
                                    </div>
                                </div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                                <div class="card invisible d-none d-md-block p-0 m-0"></div>
                            </div>
                        </div>
                        <small class="form-text text-muted">
                            Choose image for product
                        </small>
                        <div class="row my-2 mx-0">
                            <div id="message-alert" class="col-8 mr-sm-auto alert alert-danger invisible rounded-0 mb-0" role="alert"></div>
                            <button type="button" class="col-4 col-sm-auto create-product btn btn-success rounded-0">
                                <i id="spinner" class="fas fa-sync fa-spin"></i>
                                Create
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
        </tr>
        </thead>
        <tbody id="products-table-body">
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td>
                    <img src="<?php echo $product['img_url']; ?>" width="100" height="75" alt="">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


