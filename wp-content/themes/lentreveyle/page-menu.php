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
                                <span class="card-title">' . esc_html($term->name) . '</span>
                            </div>
                        </div>
                      </a>';
            }
        }
        ?>
    </div>

    <div id="categories-anchor">
        <!-- Affichage dynamique du nom du menu -->
        <div id="selected-menu-name">
            <h3 class="selected-menu-title"></h3>
        </div>

        <div class="category-links">
            <!-- Les catégories seront mises à jour dynamiquement via AJAX -->
        </div>

        <div id="plats-grid">
            <!-- Les plats seront mis à jour dynamiquement via AJAX -->
        </div>

        <!-- Contenu des formules (ajouter en dur) -->
        <div id="formule-entre-veyle" class="formule-content" style="display: none;">
            <div class="formule-header">Formule de l'Entre Veyle - 21€</div>
            <ul>
                <li>Salade repas au choix</li>
                <li>ou</li>
                <li>Poisson du moment et sa garniture</li>
                <li>ou</li>
                <li>Andouillette Mâconnaise et frites maison</li>
            </ul>
            <div class="separator"></div>
            <ul>
                <li>Dessert du moment et café</li>
                <li>(Supplément de 3 € pour le fromage)</li>
            </ul>
        </div>
        <div id="menu-du-jour" class="formule-content" style="display: none;">
            <div class="formule-header">Menu du Jour - 17€ - Consulter l'ardoise</div>
            <ul>
                <li>Une entrée</li>
                <li>Un plat</li>
                <li>Un dessert</li>
                <li>1/4 de vin et un café</li>
            </ul>
        </div>
        <div id="menu-enfant" class="formule-content" style="display: none;">
            <div class="formule-header">Menu Enfant (-12 ans) - 9€</div>
            <ul>
                <li>Une entrée</li>
                <li>Un plat</li>
                <li>Un dessert</li>
            </ul>
        </div>
        <div id="menu-entre-veyle" class="formule-content" style="display: none;">
            <div class="formule-header">Menu Entre Veyle à 29,00 €</div>
            <ul>
                <li>Salade fraicheur (Salade tomate billes de mozzarelle et jambon cru)</li>
                <li>Brechet de poulet en persillade et frites maison</li>
                <li>Dessert au choix</li>
                <li>Supplément fromage et dessert + 4,00 €</li>
            </ul>
        </div>
        <div id="menu-grenouilles" class="formule-content" style="display: none;">
            <div class="formule-header">Menu Grenouilles Fraîches à 42,00 € <span>sur commande</span></div>
            <ul>
                <li>Saumon gravlax</li>
                <li>ou</li>
                <li>Salade César (aiguillette de poulet pané, parmesan, crouton, tomate, sauce césar)</li>
                <div class="separator"></div>
                <li>Grenouilles fraîches en persillade 300 grs accompagnées de garniture de légumes</li>
                <div class="separator"></div>
                <li>Dessert au choix</li>
                <li>Supplément fromage et dessert + 4,00 €</li>
            </ul>
        </div>
        <div id="menu-gourmand" class="formule-content" style="display: none;">
            <div class="formule-header">Menu Gourmand à 36,00 €</div>
            <ul>
                <li>Saumon gravlax</li>
                <li>ou</li>
                <li>Petite friture de Joël sauce tartare</li>
                <li>ou</li>
                <li>Salade César (aiguillette de poulet pané, parmesan, crouton, tomate, sauce césar)</li>
                <div class="separator"></div>
                <li>Filet de canette au miel et romarin</li>
                <li>ou</li>
                <li>Risotto aux gambas</li>
                <li>ou</li>
                <li>Poisson du moment : Dos de cabillaud citron aneth</li>
                <div class="separator"></div>
                <li>Dessert au choix</li>
                <li>Supplément fromage et dessert + 4,00 €</li>
            </ul>
        </div>
        <div id="soiree-creole" class="formule-content" style="display: none;">
            <div class="formule-header">Soirée Créole à 29,00 €</div>
            <ul>
                <li>Assortiments d'Entrées</li>
                <div class="separator"></div>
                <li>Rougail Saucisses et Cari Gambas</li>
                <div class="separator"></div>
                <li>Assiette Gourmande</li>
            </ul>
        </div>
    </div>
</div>

<?php
get_footer();
?>
