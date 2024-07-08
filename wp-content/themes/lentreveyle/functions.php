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

