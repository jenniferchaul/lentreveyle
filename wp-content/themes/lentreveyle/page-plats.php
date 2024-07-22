<?php
/*
Template Name: Plats
*/

get_header();
?>

<div class="plats-container">
    <h1>Nos Plats</h1>

    <div class="menu-buttons">
        <?php
        // Récupérer les termes de la taxonomie 'main-menu'
        $main_menu_terms = get_terms(array(
            'taxonomy' => 'main-menu',
            'hide_empty' => false,
        ));

        if (!empty($main_menu_terms) && !is_wp_error($main_menu_terms)) {
            foreach ($main_menu_terms as $term) {
                echo '<button onclick="filterMenu(\'' . esc_js($term->slug) . '\')">' . esc_html($term->name) . '</button>';
            }
        }
        ?>
    </div>

    <?php
    // Obtenir les paramètres de menu et de catégorie de l'URL
    $menu = isset($_GET['menu']) ? sanitize_text_field($_GET['menu']) : '';
    $category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

    if (!empty($menu)) {
        // Récupérer les termes de la taxonomie 'category' liés aux plats du menu sélectionné
        $args = array(
            'post_type' => 'dish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'main-menu',
                    'field' => 'slug',
                    'terms' => $menu
                )
            ),
            'posts_per_page' => -1,
            'fields' => 'ids'
        );

        $query = new WP_Query($args);
        $post_ids = $query->posts;
        $category_terms = array();

        if (!empty($post_ids)) {
            $category_terms = wp_get_object_terms($post_ids, 'category', array('orderby' => 'name', 'order' => 'ASC'));

            if (empty($category) && !empty($category_terms) && !is_wp_error($category_terms)) {
                // Sélectionner la première catégorie par défaut
                $category = $category_terms[0]->slug;
            }
        }
    ?>

    <div class="category-buttons">
        <?php
        if (!empty($category_terms) && !is_wp_error($category_terms)) {
            echo '<button onclick="filterCategory(\'\')">Tous</button>';
            foreach ($category_terms as $term) {
                echo '<button onclick="filterCategory(\'' . esc_js($term->slug) . '\')">' . esc_html($term->name) . '</button>';
            }
        } else {
            echo '<p>Aucune catégorie disponible pour ce menu.</p>';
        }
        ?>
    </div>

    <div id="plats-grid">
        <?php
        echo '<pre>Debug: Selected menu - ' . esc_html($menu) . ', Selected category - ' . esc_html($category) . '</pre>'; // Debugging message

        $tax_query = array(
            array(
                'taxonomy' => 'main-menu',
                'field' => 'slug',
                'terms' => $menu
            )
        );

        if (!empty($category)) {
            $tax_query[] = array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category
            );
        }

        $args = array(
            'post_type' => 'dish',
            'tax_query' => $tax_query,
            'posts_per_page' => -1,
        );

        echo '<pre>Debug: WP_Query arguments - ' . json_encode($args) . '</pre>'; // Debugging message

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<div class="plats-grid">';
            while ($query->have_posts()) {
                $query->the_post();
                $price = get_post_meta(get_the_ID(), 'price', true); // Assuming 'price' is the meta key
                ?>
                <div class="plat-card">
                    <h2><?php the_title(); ?></h2>
                    <div class="plat-content">
                        <?php the_excerpt(); ?>
                        <?php if ($price) : ?>
                            <p class="plat-price">Prix: <?php echo esc_html($price); ?> €</p>
                        <?php endif; ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="view-details">Voir les détails</a>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>Aucun plat trouvé.</p>';
            echo '<pre>Debug: No posts found with these arguments.</pre>'; // Debugging message
        }

        wp_reset_postdata();
    ?>

    </div>

    <?php } // Fin de l'affichage conditionnel ?>

</div>

<script>
function filterMenu(menu) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('menu', menu);
    urlParams.delete('category'); // Reset category filter when changing the menu
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    window.location.href = newUrl;
}

function filterCategory(category) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set('category', category);
    const newUrl = window.location.pathname + '?' + urlParams.toString();
    window.location.href = newUrl;
}
</script>

<?php
get_footer();
?>
