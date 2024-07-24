<?php

// Initialisation du thème
add_action('after_setup_theme', 'lentreveyle_initializeTheme');

// Retirez l'ancien hook utilisant the_block_template_skip_link().
remove_action('wp_footer', 'the_block_template_skip_link' );

// Ajoutez le nouveau hook utilisant wp_enqueue_block_template_skip_link().
add_action('wp_footer', 'wp_enqueue_block_template_skip_link' );

if (!function_exists('lentreveyle_initializeTheme')) {
    function lentreveyle_initializeTheme()
    {
        // Ajout de la prise en charge de la balise <title>
        add_theme_support('title-tag');

        // Activation des images mises en avant pour les articles
        add_theme_support('post-thumbnails');

        // Activation des menus
        add_theme_support('menus');
    }
}

// Chargement des assets du thème
add_action('wp_enqueue_scripts', function() {
    // Chargement du fichier CSS principal
    wp_enqueue_style(
        'lentreveyle-styles', // Identifiant de notre fichier CSS
        get_theme_file_uri('assets/css/style.css'), // Chemin vers le fichier CSS
        [], // Aucune dépendance
        '1.0.0' // Version du fichier CSS
    );

    // Chargement du CSS de Swiper
    wp_enqueue_style(
        'swiper-css', // Identifiant du fichier CSS de Swiper
        'https://unpkg.com/swiper/swiper-bundle.min.css', // URL du fichier CSS
        [], // Aucune dépendance
        null // Pas de version spécifique
    );

    // Chargement du script JavaScript de Swiper
    wp_enqueue_script(
        'swiper-js', // Identifiant du script
        'https://unpkg.com/swiper/swiper-bundle.min.js', // URL du fichier JavaScript
        [], // Aucune dépendance
        null, // Pas de version spécifique
        true // Le script sera placé dans le footer
    );

    // Chargement du script JavaScript principal
    wp_enqueue_script(
        'main-js', // Identifiant du script
        get_theme_file_uri('assets/js/main.js'), // Chemin vers le fichier JavaScript
        ['swiper-js'], // Dépend de swiper-js
        '1.0.0', // Version du script JavaScript
        true // Le script sera placé dans le footer
    );
});

// Ajouter le champ personnalisé pour l'image à la page de création et d'édition des termes de taxonomie
function add_menu_image_field() {
    ?>
    <div class="form-field">
        <label for="menu_image"><?php _e('Menu Image', 'textdomain'); ?></label>
        <input type="button" class="button button-secondary" id="upload_image_button" value="<?php _e('Upload Image', 'textdomain'); ?>" />
        <input type="hidden" name="menu_image" id="menu_image" value="" />
        <div id="image_preview" style="margin-top: 10px;"></div>
    </div>
    <?php
}
add_action('main-menu_add_form_fields', 'add_menu_image_field', 10, 2);

function edit_menu_image_field($term) {
    $image_id = get_term_meta($term->term_id, 'menu_image', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="menu_image"><?php _e('Menu Image', 'textdomain'); ?></label></th>
        <td>
            <input type="button" class="button button-secondary" id="upload_image_button" value="<?php _e('Upload Image', 'textdomain'); ?>" />
            <input type="hidden" name="menu_image" id="menu_image" value="<?php echo esc_attr($image_id); ?>" />
            <div id="image_preview" style="margin-top: 10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="" style="max-width: 300px;" />
                <?php endif; ?>
            </div>
        </td>
    </tr>
    <?php
}
add_action('main-menu_edit_form_fields', 'edit_menu_image_field', 10, 2);

// Enregistrer le champ personnalisé
function save_menu_image_meta($term_id) {
    if (isset($_POST['menu_image']) && '' !== $_POST['menu_image']) {
        $image_id = intval($_POST['menu_image']);
        update_term_meta($term_id, 'menu_image', $image_id);
    } else {
        delete_term_meta($term_id, 'menu_image');
    }
}
add_action('created_main-menu', 'save_menu_image_meta', 10, 2);
add_action('edited_main-menu', 'save_menu_image_meta', 10, 2);

// Charger le script de la médiathèque
function load_wp_media_files() {
    wp_enqueue_media();
    wp_enqueue_script('admin-js', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

function enqueue_filter_scripts() {
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
    wp_localize_script('main-js', 'ajax_filter_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_scripts');

function ajax_filter_posts() {
    $menu = isset($_POST['menu']) ? sanitize_text_field($_POST['menu']) : '';
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $tax_query = array();

    if (!empty($menu)) {
        $tax_query[] = array(
            'taxonomy' => 'main-menu',
            'field' => 'slug',
            'terms' => $menu
        );
    }

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
        'meta_key' => 'order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $price = get_post_meta(get_the_ID(), 'price', true); // Assuming 'price' is the meta key
            ?>
            <div class="plat-card">
                <div class="plat-header">
                    <h2 class="plat-title"><?php the_title(); ?></h2>
                    <span class="menu-line"></span>
                    <?php if ($price) : ?>
                        <p class="plat-price"><?php echo esc_html($price); ?> €</p>
                    <?php endif; ?>
                </div>
                <p class="plat-description"><?php the_excerpt(); ?></p>
            </div>
            <?php
        }
    } else {
        echo '<p>Aucun plat trouvé.</p>';
    }

    wp_die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_posts');




function ajax_get_categories() {
    $menu = isset($_POST['menu']) ? sanitize_text_field($_POST['menu']) : '';

    if (!empty($menu)) {
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

        if (!empty($post_ids)) {
            $category_terms = wp_get_object_terms($post_ids, 'category', array('orderby' => 'name', 'order' => 'ASC'));

            if (!empty($category_terms) && !is_wp_error($category_terms)) {
                foreach ($category_terms as $term) {
                    $active_class = ($term->slug == 'entree') ? 'active' : '';
                    echo '<a href="#" data-category="' . esc_js($term->slug) . '" class="' . $active_class . '">' . esc_html($term->name) . '</a>';
                }
            }
        } else {
            echo '<p>Aucune catégorie disponible pour ce menu.</p>';
        }
    }

    wp_die();
}

add_action('wp_ajax_get_categories', 'ajax_get_categories');
add_action('wp_ajax_nopriv_get_categories', 'ajax_get_categories');
