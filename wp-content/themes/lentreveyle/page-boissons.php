<?php
/*
Template Name: Boissons
*/

get_header();
?>
<div class="boissons-container">
    <img class="picto-menu" src="<?= get_theme_file_uri('assets/images/lisere.svg') ?>" alt="décoration titre menu" />
    <h1>Nos Boissons</h1>

    <div class="cards-bx">
        <?php
        // Récupérer les termes de la taxonomie 'main-menu'
        $category_boisson_terms = get_terms(array(
            'taxonomy' => 'category-boisson',
            'hide_empty' => false,
        ));

        if (!empty($category_boisson_terms) && !is_wp_error($category_boisson_terms)) {
            foreach ($category_boisson_terms as $term) {
                // Récupérer l'image du champ personnalisé
                $image_id = get_term_meta($term->term_id, 'menu_image', true);
                $image_url = $image_id ? wp_get_attachment_url($image_id) : get_template_directory_uri() . '/assets/images/default.jpg';

                echo '<a href="#categories-anchor" class="card" data-menu="' . esc_js($term->slug) . '">
                        <div class="img-card">
                            <img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '">
                            <div class="card-title-container">
                                <span class="card-title">' . esc_html($term->name) . '</span>
                            </div>
                        </div>
                      </a>';
            }
        }
        ?>
    </div>

    <div class="category-links">
        <!-- Les catégories seront mises à jour dynamiquement via AJAX -->
    </div>

    <div id="boissons-grid">
        <!-- Les boissons seront mises à jour dynamiquement via AJAX -->
    </div>
</div>

<?php get_footer(); ?>
