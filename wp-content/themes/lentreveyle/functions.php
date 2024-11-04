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


// Ajouter le champ personnalisé pour le fichier PDF
function add_pdf_meta_box() {
    add_meta_box(
        'pdf_meta_box', // ID de la meta box
        'Télécharger un PDF', // Titre de la meta box
        'pdf_meta_box_callback', // Fonction callback
        array('submenu', 'dish','drink'), // Type de contenu (CPT)
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

// Bannière accueil

// Ajoute une page de réglages pour l'annonce
function restaurant_announcement_settings() {
    add_options_page(
        'Annonce du restaurant',
        'Annonce du restaurant',
        'manage_options',
        'restaurant-announcement',
        'restaurant_announcement_settings_page'
    );
}
add_action('admin_menu', 'restaurant_announcement_settings');

// Affichage de la page des réglages
function restaurant_announcement_settings_page() {
    ?>
    <div class="wrap">
        <h1>Annonce du restaurant</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('restaurant_announcement_options');
                do_settings_sections('restaurant-announcement');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Initialisation des options de l'annonce
function restaurant_announcement_settings_init() {
    add_settings_section(
        'restaurant_announcement_section',
        'Configuration de l\'annonce',
        null,
        'restaurant-announcement'
    );

    add_settings_field(
        'restaurant_announcement_enabled',
        'Activer l\'annonce',
        'restaurant_announcement_enabled_render',
        'restaurant-announcement',
        'restaurant_announcement_section'
    );

    add_settings_field(
        'restaurant_announcement_message',
        'Message de l\'annonce',
        'restaurant_announcement_message_render',
        'restaurant-announcement',
        'restaurant_announcement_section'
    );

    register_setting('restaurant_announcement_options', 'restaurant_announcement_enabled');
    register_setting('restaurant_announcement_options', 'restaurant_announcement_message');
}
add_action('admin_init', 'restaurant_announcement_settings_init');

// Champ de l'option "Activer l'annonce"
function restaurant_announcement_enabled_render() {
    $enabled = get_option('restaurant_announcement_enabled');
    ?>
    <input type="checkbox" name="restaurant_announcement_enabled" value="1" <?php checked(1, $enabled, true); ?>>
    <?php
}

// Champ de l'option "Message de l'annonce"
function restaurant_announcement_message_render() {
    $message = get_option('restaurant_announcement_message');
    ?>
    <textarea name="restaurant_announcement_message" rows="4" cols="50"><?php echo esc_textarea($message); ?></textarea>
    <?php
}


?>


