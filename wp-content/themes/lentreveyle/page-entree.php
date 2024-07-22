<?php
/*
Template Name: Plats
*/

get_header();
?>

<div class="plats-container">
    <h1>Nos Plats</h1>

    <?php
    $args = array(
        'post_type' => 'dish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'plat'
            )
        ),
        'posts_per_page' => -1,
    );

    // Debugging message
    echo '<pre>Debug: WP_Query arguments - ' . json_encode($args) . '</pre>';

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
    }

    wp_reset_postdata();
    ?>
</div>

<?php
get_footer();
?>
