<?php get_header();

$sort = isset($_GET['sorted_by']) ? $_GET['sorted_by'] : false;

$sorts = [
    '0' => 'Choose...',
    'mark' => 'Mark',
    'price_0' => 'Price - first cheap',
    'price_1' => 'Price - first expensive'
];


$currentTermId = get_queried_object_id();

$queryArgs = [
    'post_type' => 'naturlith_products',
    'tax_query' => [
        array(
            'taxonomy' => 'naturlith_products_category',
            'terms' => array($currentTermId)
        )
    ]
];

if ($sort) {
    $sorts_items = explode('_', $sort);

    $queryArgs['meta_query'] = array(
        'price' => array(
            'key' => 'naturlith_product_price',
            'type' => 'DECIMAL'
        ),
        'mark' => array(
            'key' => 'naturlith_product_mark',
        )
    );
    $queryArgs['orderby'] = $sorts_items[0];
    $queryArgs['order'] = 'ASC';

    if(isset($sorts_items[1])){
        $queryArgs['order'] = (bool)$sorts_items[1] ? 'DESC' : 'ASC';
    }

}

$productsQuery = new WP_Query($queryArgs);

$allFilters = getAllFilters($productsQuery);

function getAllFilters($wp_query){

    $posts = $wp_query->get_posts();
    $filters = [];
    foreach ($posts as $post) {
        $terms = wp_get_post_terms($post->ID, 'naturlith_products_filter');
        foreach ($terms as $term) {
            if (!in_array($term, $filters)) {
                $filters[] = $term;
            }
        }
    }

    return $filters;
}


$filtersString = isset($_GET["filter"]) ? $_GET["filter"] : null;

$customFilters = array();

if (isset($filtersString)) {

    $incFilters = explode(',', $filtersString);

    $queryArgs['tax_query'][] = array(
        'taxonomy' => 'naturlith_products_filter',
        'terms' => $incFilters,
        'operator' => 'AND',
    );

    foreach ($allFilters as $filter) {
        if (in_array($filter->term_id, $incFilters)) {
            $customFilters[] = $filter;
        }
    }
}

$productsQuery = new WP_Query($queryArgs);

$incFilters = getIncludeFilters($productsQuery);

function getIncludeFilters($wp_query){

    $posts = $wp_query->get_posts();
    $filters = [];
    foreach ($posts as $post) {
        $terms = wp_get_post_terms($post->ID, 'naturlith_products_filter');
        foreach ($terms as $term) {
            if (!in_array($term->term_id, $filters)) {
                $filters[] = $term->term_id;
            }
        }
    }

    return $filters;
}

?>
    <section id="products">
        <div class="container py-5">
            <div class="row justify-content-between mb-0">
                <div class="col-auto align-self-center">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-3 align-self-center">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="sortSelect">Sorted by: </label>
                        </div>
                        <select class="custom-select" id="sortSelect">
                            <?php foreach ($sorts as $key => $value) : ?>
                                <option value="<?php echo $key; ?>"
                                    <?php echo ($sort and $sort == $key) ? 'selected' : ''; ?>>
                                    <?php echo $value; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr class="mb-5">
            <div class="row">
                <div class="col-12 col-md-3">
                    <h6 class="text-uppercase ml-3">Categories</h6>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'products_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_class' => 'list-group mb-4 mt-3',
                        'menu_id' => 'left-products-menu',
                        'depth' => 1
                    )); ?>
                    <h6 class="text-uppercase ml-3">Filters</h6>
                    <form id="product-filter" class="mb-4 mt-3 pl-3">

                        <?php foreach ($allFilters as $filter) : ?>
                            <div class="form-check my-2">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="<?php echo $filter->slug; ?>"
                                       value="on"
                                       id="<?php echo $filter->term_id; ?>"
                                    <?php echo in_array($filter, $customFilters) ? ' checked' : ''; ?>
                                    <?php echo !in_array($filter->term_id, $incFilters) ? 'disabled' : '';?>
                                >
                                <label class="form-check-label"
                                       for="<?php echo $filter->term_id; ?>">
                                    <?php echo $filter->name; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <?php
                        // Start the loop.
                        while ($productsQuery->have_posts()) : $productsQuery->the_post();
                            get_template_part('inc/templates/content', 'products');
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>