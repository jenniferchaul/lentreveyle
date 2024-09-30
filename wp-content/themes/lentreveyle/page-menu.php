<?php
/*
Template Name: Plats
*/

get_header();
?>
<div class="plats-container">
    <img class="picto-menu" src="<?= get_theme_file_uri('assets/images/lisere.svg') ?>" alt="décoration titre menu" />
    <h1>Nos Menus</h1>

    <div class="cards-bx">
        <?php
        // Récupérer tous les plats
        $menus_args = array(
            'post_type' => 'dish', // Utilisation de ton CPT 'dish'
            'posts_per_page' => -1, // Récupère tous les plats
            'orderby' => 'date', // Trie par date
            'order' => 'ASC' // Ordre croissant (du plus ancien au plus récent)
        );

        $menus = new WP_Query($menus_args);

        if ($menus->have_posts()) :
            while ($menus->have_posts()) : $menus->the_post();
                $menu_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $menu_name = get_the_title();
                $pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true); // Récupère l'URL du PDF associée au plat


                // Affichage de la carte du menu
                echo '<div class="card">';
                echo '<a href="' . esc_url($pdf_url) . '" target="_blank" rel="noopener noreferrer">';
                echo '<div class="img-card">';
                echo '<img src="' . esc_url($menu_image_url) . '" alt="' . esc_attr($menu_name) . '">';
                echo '<div class="card-title-container">';
                echo '<span class="card-title">' . esc_html($menu_name) . '</span>';
                echo '</div></div></a></div>';
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucun menu disponible.</p>';
        endif;
        ?>
    </div>
</div>
<?php
get_footer();
?>
