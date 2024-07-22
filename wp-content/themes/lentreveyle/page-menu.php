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
                echo '<button data-menu="' . esc_js($term->slug) . '">' . esc_html($term->name) . '</button>';
            }
        }
        ?>
    </div>

    <div class="category-buttons">
        <!-- Les catégories seront mises à jour dynamiquement via AJAX -->
    </div>

    <div id="plats-grid">
        <!-- Les plats seront mis à jour dynamiquement via AJAX -->
    </div>

</div>

<?php
get_footer();
?>
