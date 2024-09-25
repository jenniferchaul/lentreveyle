<?php

// Initialisation du thème
add_action('after_setup_theme', 'lentreveyle_initializeTheme');

// Retirez l'ancien hook utilisant the_block_template_skip_link().
remove_action('wp_footer', 'the_block_template_skip_link');

// Ajoutez le nouveau hook utilisant wp_enqueue_block_template_skip_link().
add_action('wp_footer', 'wp_enqueue_block_template_skip_link');

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
add_action('wp_enqueue_scripts', function () {
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

// Ajouter image pour catégory drink

// Ajoute un champ d'image personnalisé pour les catégories de boisson
function add_drink_category_image_field() {
    ?>
    <div class="form-field">
        <label for="drink_category_image"><?php _e('Image de la catégorie', 'textdomain'); ?></label>
        <input type="hidden" id="drink_category_image" name="drink_category_image" value="">
        <div id="drink_image_preview" style="margin-top:10px;"></div>
        <button type="button" class="button" id="upload_image_button"><?php _e('Ajouter une image', 'textdomain'); ?></button>
    </div>
    <?php
}
add_action('drink_cat_add_form_fields', 'add_drink_category_image_field', 10, 2);

// Édition de la catégorie : affiche le champ d'image existant
function edit_drink_category_image_field($term) {
    $image_id = get_term_meta($term->term_id, 'drink_category_image', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="drink_category_image"><?php _e('Image de la catégorie', 'textdomain'); ?></label></th>
        <td>
            <input type="hidden" id="drink_category_image" name="drink_category_image" value="<?php echo esc_attr($image_id); ?>">
            <div id="drink_image_preview" style="margin-top:10px;">
                <?php if ($image_url): ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width: 300px;">
                <?php endif; ?>
            </div>
            <button type="button" class="button" id="upload_image_button"><?php _e('Modifier l\'image', 'textdomain'); ?></button>
        </td>
    </tr>
    <?php
}
add_action('drink_cat_edit_form_fields', 'edit_drink_category_image_field', 10, 2);

// Sauvegarde des données
function save_drink_category_image($term_id) {
    if (isset($_POST['drink_category_image'])) {
        update_term_meta($term_id, 'drink_category_image', absint($_POST['drink_category_image']));
    }
}
add_action('edited_drink_cat', 'save_drink_category_image', 10, 2);
add_action('create_drink_cat', 'save_drink_category_image', 10, 2);




























// Ajouter le champ personnalisé pour l'image à la page de création et d'édition des termes de taxonomie
function add_menu_image_field()
{
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

function edit_menu_image_field($term)
{
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
function save_menu_image_meta($term_id)
{
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
function load_wp_media_files()
{
    wp_enqueue_media();
    wp_enqueue_script('admin-js', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

function enqueue_filter_scripts()
{
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
        // Affichage du titre du menu principal une seule fois
        //if (!empty($menu)) {
        //    $menu_term = get_term_by('slug', $menu, 'main-menu');
        //    if ($menu_term) {
        //        echo '<h2 class="main-menu-title">' . esc_html($menu_term->name) . '</h2>';
        //    }
        //}

        // Variable pour garder la trace de la catégorie actuelle
        $current_category = '';

        // Parcourir les plats pour afficher les catégories et les plats
        while ($query->have_posts()) {
            $query->the_post();

            // Récupérer les catégories du plat
            $categories = get_the_terms(get_the_ID(), 'category');

            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $cat) {
                    // Si la catégorie change, affichez le nouveau titre de la catégorie
                    if ($cat->name !== $current_category) {
                        $current_category = $cat->name;
                        echo '<h3 class="category-title">' . esc_html($current_category) . '</h3>';
                    }
                    break; // On prend la première catégorie et on s'arrête
                }
            }

            // Récupérer le prix du plat
            $price = get_post_meta(get_the_ID(), 'price', true);

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


function ajax_get_menu_name() {
    $menu_slug = isset($_POST['menu']) ? sanitize_text_field($_POST['menu']) : '';

    if (!empty($menu_slug)) {
        // Récupérer l'objet du terme à partir du slug
        $menu_term = get_term_by('slug', $menu_slug, 'main-menu');

        if ($menu_term) {
            // Envoyer le nom du menu via JSON
            wp_send_json_success(array('menu_name' => $menu_term->name));
        } else {
            wp_send_json_error('Menu not found');
        }
    } else {
        wp_send_json_error('No menu selected');
    }

    wp_die();
}
add_action('wp_ajax_get_menu_name', 'ajax_get_menu_name');
add_action('wp_ajax_nopriv_get_menu_name', 'ajax_get_menu_name');



function ajax_get_categories() {
    $menu = isset($_POST['menu']) ? sanitize_text_field($_POST['menu']) : '';

    // Afficher le titre du menu
    //if (!empty($menu)) {
    //    echo '<h2>' . esc_html($menu) . '</h2>'; // Affiche le titre du menu principal
    //}

    // Define the desired order of categories
    $category_order = array('entrees', 'plats', 'dessert-et-fromages', 'salades-repas');

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
            $category_terms = wp_get_object_terms($post_ids, 'category', array('orderby' => 'meta_value_num', 'meta_key' => 'category_order', 'order' => 'ASC'));

            if (!empty($category_terms) && !is_wp_error($category_terms)) {
                // Output sorted categories
                foreach ($category_terms as $term) {
                    echo '<a href="#" data-category="' . esc_js($term->slug) . '">' . esc_html($term->name) . '</a>';
                }
            } else {
                echo '<p>Aucune catégorie disponible pour ce menu.</p>';
            }
        }
    }

    // Ajouter les formules en fonction du menu sélectionné
    if ($menu === 'menu-de-la-semaine') {
        echo '<a href="#" data-category="formule-entre-veyle" data-formula="true">Formule de l\'Entre Veyle</a>';
        echo '<a href="#" data-category="menu-du-jour" data-formula="true">Menu du Jour</a>';
        echo '<a href="#" data-category="menu-enfant" data-formula="true">Menu Enfant</a>';
    } elseif ($menu === 'menu-du-week-end') {
        echo '<a href="#" data-category="menu-entre-veyle" data-formula="true">Menu Entre Veyle</a>';
        echo '<a href="#" data-category="menu-grenouilles" data-formula="true">Menu Grenouilles Fraîches</a>';
        echo '<a href="#" data-category="menu-gourmand" data-formula="true">Menu Gourmand</a>';
        echo '<a href="#" data-category="menu-enfant" data-formula="true">Menu Enfant</a>';
    } elseif ($menu === 'soiree-creole') {
        echo '<a href="#" data-category="soiree-creole" data-formula="true"></a>';
    }

    wp_die();
}


add_action('wp_ajax_get_categories', 'ajax_get_categories');
add_action('wp_ajax_nopriv_get_categories', 'ajax_get_categories');


// Ajouter le champ personnalisé "order" aux catégories
function add_category_order_field() {
    ?>
    <div class="form-field">
        <label for="category_order"><?php _e('Order', 'textdomain'); ?></label>
        <input type="number" name="category_order" id="category_order" value="" />
        <p class="description"><?php _e('Order in which the category should be displayed', 'textdomain'); ?></p>
    </div>
    <?php
}
add_action('category_add_form_fields', 'add_category_order_field', 10, 2);

function edit_category_order_field($term) {
    $order = get_term_meta($term->term_id, 'category_order', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_order"><?php _e('Order', 'textdomain'); ?></label></th>
        <td>
            <input type="number" name="category_order" id="category_order" value="<?php echo esc_attr($order); ?>" />
            <p class="description"><?php _e('Order in which the category should be displayed', 'textdomain'); ?></p>
        </td>
    </tr>
    <?php
}
add_action('category_edit_form_fields', 'edit_category_order_field', 10, 2);

// Enregistrer le champ personnalisé
function save_category_order_meta($term_id) {
    if (isset($_POST['category_order']) && '' !== $_POST['category_order']) {
        $order = intval($_POST['category_order']);
        update_term_meta($term_id, 'category_order', $order);
    } else {
        delete_term_meta($term_id, 'category_order');
    }
}
add_action('created_category', 'save_category_order_meta', 10, 2);
add_action('edited_category', 'save_category_order_meta', 10, 2);

// Ajouter le champ personnalisé pour le fichier PDF
function add_pdf_meta_box() {
    add_meta_box(
        'pdf_meta_box', // ID de la meta box
        'Télécharger un PDF', // Titre de la meta box
        'pdf_meta_box_callback', // Fonction callback
        'submenu', // Type de contenu (CPT)
        'side', // Contexte de la meta box
        'default' // Priorité de la meta box
    );
}
add_action('add_meta_boxes', 'add_pdf_meta_box');

function pdf_meta_box_callback($post) {
    // Utilisation de nonce pour vérifier les permissions
    wp_nonce_field('save_pdf_meta_box_data', 'pdf_meta_box_nonce');

    // Récupération de l'URL du fichier PDF si elle existe
    $pdf_url = get_post_meta($post->ID, '_pdf_url', true);

    echo '<p><label for="pdf_url">URL du fichier PDF :</label></p>';
    echo '<input type="text" id="pdf_url" name="pdf_url" value="' . esc_attr($pdf_url) . '" style="width: 100%;" />';
    echo '<input type="button" id="upload_pdf_button" class="button" value="Télécharger le fichier PDF" />';
    ?>
    <script>
        jQuery(document).ready(function($) {
            var file_frame;
            $('#upload_pdf_button').on('click', function(event) {
                event.preventDefault();

                // Si le frame file_frame existe déjà, alors le fermer
                if (file_frame) {
                    file_frame.open();
                    return;
                }

                // Création du frame de sélection du fichier
                file_frame = wp.media({
                    title: 'Choisir un fichier PDF',
                    button: {
                        text: 'Utiliser ce fichier',
                    },
                    multiple: false
                });

                // Lorsque le fichier est sélectionné, le récupérer
                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#pdf_url').val(attachment.url);
                });

                // Ouvrir le frame
                file_frame.open();
            });
        });
    </script>
    <?php
}

// Enregistrer les données du champ PDF
function save_pdf_meta_box_data($post_id) {
    // Vérification des permissions
    if (!isset($_POST['pdf_meta_box_nonce']) || !wp_verify_nonce($_POST['pdf_meta_box_nonce'], 'save_pdf_meta_box_data')) {
        return;
    }

    // Vérifier les permissions d'édition
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Enregistrer la valeur du champ PDF
    if (isset($_POST['pdf_url'])) {
        update_post_meta($post_id, '_pdf_url', sanitize_text_field($_POST['pdf_url']));
    }
}
add_action('save_post', 'save_pdf_meta_box_data');

// Fonction pour récupérer les catégories de boissons
function jcdevandcode_get_boisson_categories() {
    $terms = get_terms(array(
        'taxonomy' => 'categorie_boisson',
        'hide_empty' => false,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            echo '<a href="#" data-category="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a>';
        }
    } else {
        echo '<p>Aucune catégorie trouvée.</p>';
    }

    wp_die(); // Fin de la fonction AJAX
}
add_action('wp_ajax_get_boisson_categories', 'jcdevandcode_get_boisson_categories');
add_action('wp_ajax_nopriv_get_boisson_categories', 'jcdevandcode_get_boisson_categories');

// Fonction pour filtrer les boissons par catégorie
function jcdevandcode_filter_boissons() {
    $category = $_POST['category'];

    $args = array(
        'post_type' => 'boisson',
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie_boisson',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        ),
    );

    $boissons = new WP_Query($args);

    if ($boissons->have_posts()) {
        while ($boissons->have_posts()) {
            $boissons->the_post();
            echo '<div class="boisson-item">';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p>' . get_the_content() . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Aucune boisson trouvée.</p>';
    }

    wp_die(); // Fin de la fonction AJAX
}
add_action('wp_ajax_filter_boissons', 'jcdevandcode_filter_boissons');
add_action('wp_ajax_nopriv_filter_boissons', 'jcdevandcode_filter_boissons');


?>


