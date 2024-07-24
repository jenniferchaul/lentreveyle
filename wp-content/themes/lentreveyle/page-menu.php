<?php
/*
Template Name: Plats
*/

get_header();
?>
<div class="background-card"></div>
<div class="plats-container">
    <img class="picto-menu" src="<?= get_theme_file_uri('assets/images/lisere.svg') ?>" alt="décoration titre menu" />
    <h1>Nos Menus</h1>

    <div class="cards-bx">
        <?php
        // Récupérer les termes de la taxonomie 'main-menu'
        $main_menu_terms = get_terms(array(
            'taxonomy' => 'main-menu',
            'hide_empty' => false,
        ));

        if (!empty($main_menu_terms) && !is_wp_error($main_menu_terms)) {
            foreach ($main_menu_terms as $term) {
                // Récupérer l'image du champ personnalisé
                $image_id = get_term_meta($term->term_id, 'menu_image', true);
                $image_url = $image_id ? wp_get_attachment_url($image_id) : get_template_directory_uri() . '/assets/images/default.jpg';

                echo '<a href="#categories-anchor" class="card" data-menu="' . esc_js($term->slug) . '">
                        <div class="img-card">
                            <img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '">
                            <div class="card-title-container">
                                <h3 class="card-title">' . esc_html($term->name) . '</h3>
                            </div>
                        </div>
                      </a>';
            }
        }
        ?>
    </div>

    <div id="categories-anchor">
        <div class="category-links">
            <!-- Les catégories seront mises à jour dynamiquement via AJAX -->
        </div>

        <div id="plats-grid">
            <!-- Les plats seront mis à jour dynamiquement via AJAX -->
        </div>
    </div>

</div>

<?php
get_footer();
?>
