<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 3/13/18
	 * Time: 3:43 PM
	 */

	get_header();

?>
    <div class="container">
        <?php // Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'inc/templates/content', 'category' );

				// End the loop.
			endwhile;
			// Previous/next page navigation.
			the_posts_pagination( array(
                'show_all'     => false, // показаны все страницы участвующие в пагинации
                'end_size'     => 1,     // количество страниц на концах
                'mid_size'     => 1,     // количество страниц вокруг текущей
                'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'    => __('« Previous'),
                'next_text'    => __('Next »'),
                'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
            ));
		?>
    </div>
<?php get_footer();