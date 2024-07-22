<?php
/*
Template Name: Menus Principaux
*/

get_header();
?>

<div class="main-menus-container">
    <h1>Nos Menus Principaux</h1>

    <?php
    $args = array(
        'post_type' => 'main-menu', // Utilisez le slug correct ici
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="main-menus-grid">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="main-menu-card">
                <h2><?php the_title(); ?></h2>
                <div class="main-menu-content">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="view-details">Voir les détails</a>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>Aucun menu trouvé.</p>';
    }

    wp_reset_postdata();
    ?>
</div>

<?php
get_footer();
?>
