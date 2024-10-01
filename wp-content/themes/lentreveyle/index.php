<?php get_header(); ?>

<section id="hero" class="hero">
    <div class="hero-presentation">

        <h1>L'Entre Veyle</h1>

        <h2>Savourer l'authenticité de la cuisine maison</h2>

        <h3>
            Explorez nos menus variés et délicieux
        </h3>

        <div>

            <a href="<?= home_url('/tous-les-plats') ?>" class="hero-btn">
                <span>Voir nos menus</span>
                <i>
                </i>
            </a>
        </div>

        <div class="shape-bottom">
            <img src="<?= get_theme_file_uri('assets/images/img-curve.png') ?>" alt="fond d'écran restaurant l'Entre Veyle">
        </div>
</section>

<section class="intro">
    <div class="intro-text flex">
        <h2 class="title-intro">Bienvenue à l'Entre Veyle</h>

            <h3 class="title-intro_middle">
                Restaurant traditionnel <br />
                au coeur de Grièges
            </h3>

            <p>
                Dégustez une cuisine pleine de caractère à
                <span>L'Entre Veyle</span>. De nos grenouilles fraîches à notre
                délicieux plat de poulet à la crème avec morilles, nos menus regorgent
                de <span>saveurs locales et familiales</span>. Venez découvrir nos
                plats variés et laissez-vous tenter par une expérience culinaire
                unique.
            </p>

            <div>
                <a href="#contact" class="hero-btn">
                    <span>Contactez-nous</span>
                    <i>
                    </i>
                </a>
            </div>
    </div>

    <div class="intro-img-container flex">
        <div class="intro-img">
            <div class="intro-img_left">
                <div>
                    <img class="img-border img1" src="<?= get_theme_file_uri('assets/images/burger.png') ?>" alt="photo plat burger" />
                </div>
                <div>
                    <img class="img-border img2" src="<?= get_theme_file_uri('assets/images/fraises.png') ?>" alt="photo dessert fraises" />
                </div>
            </div>
            <div class="intro-img_right">
                <div>
                    <img class="img-border img3" src="<?= get_theme_file_uri('assets/images/crevettes.png') ?>" alt="photo plat gambas" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="boxes">
    <div class="container">
        <h2>Nos menus</h2>
        <div class="grid-bx">
            <div class="box box1">
                <div class="img-box">
                    <img src="<?= get_theme_file_uri('assets/images/poisson.webp') ?>" alt="menu de l'Entre Veyle" loading="lazy">
                </div>
                <h3 class="box-title black">La carte</h3>
                <p><a href="<?= home_url('/tous-les-plats') ?>">Ouvrir le menu des plats</a></p>
            </div>

            <div class="box box2">
                <div class="img-box">
                    <img src="<?= get_theme_file_uri('assets/images/boissons.webp') ?>" alt="menu boisson de l'Entre Veyle" loading="lazy">
                </div>
                <h3 class="box-title white">Les boissons</h3>
                <?php
                // Récupération des boissons
                $drinks_args = array(
                    'post_type' => 'drink', // Utilisation du CPT 'drink'
                    'posts_per_page' => 1, 
                );

                $drinks = new WP_Query($drinks_args);

                if ($drinks->have_posts()) :
                    while ($drinks->have_posts()) : $drinks->the_post();
                        // Récupération de l'URL du PDF
                        $pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true); 
                    ?>
                        <p>
                            <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer">Ouvrir le menu des boissons</a>
                        </p>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Aucun menu de boissons disponible.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>


<section id="team" class="team">
    <div class="container-team">
        <h2>Notre équipe</h2>
        <div class="presentation">
            <div class="part-team text">
                <h3 class="title-intro_middle"><span>à</span> propos de nous</h3>

                <p class="text-about-us">
                    Dans l'atmosphère chaleureuse de leur établissement,
                    <span>Bruno et Corinne</span> vous ouvrent les portes de leur
                    <span>restaurant l'Entre Veyle</span> avec un accueil des plus
                    sincères. Forts d'une passion commune pour la cuisine et le
                    partage, ils conjuguent leurs talents pour vous offrir un moment
                    authentique, où convivialité et plaisir gustatif sont au
                    rendez-vous.
                </p>

                <p> Le restaurant est ouvert du mardi au vendredi pour le service du midi, ainsi que le dimanche midi. Le restaurant est également ouvert les vendredis et samedis soir sur réservation.</p>

                <p>Le restaurant est entièrement accessible aux personnes à mobilité réduite. Il dispose aussi d'une grande terrasse ombragée.</p>

            </div>

            <div class="part-team img">
                <img class="team-img" src="<?= get_theme_file_uri('assets/images/team.svg') ?>" alt="photo d'équipe" />

            </div>
        </div>
    </div>
</section>

<section id="event" class="events-carousel">
    <h2>Nos événements</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            // Arguments pour récupérer les événements
            $args = array(
                'post_type' => 'submenu', // Le CPT est 'submenu'
                'posts_per_page' => 2, // Nombre maximum d'événements à afficher
                'meta_key' => 'date', // Tri en fonction du champ personnalisé 'date'
                'orderby' => 'meta_value',
                'order' => 'DESC' // Ordre décroissant
            );

            // Requête pour récupérer les événements
            $events = new WP_Query($args);

            // Vérifie si des événements sont trouvés
            if ($events->have_posts()) :
                while ($events->have_posts()) : $events->the_post();
                    // Récupération de l'image à la une et d'autres détails
                    $event_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $event_name = get_the_title();

                    // Récupération de la date personnalisée
                    $event_date = get_post_meta(get_the_ID(), 'date', true);

                    // Récupération de l'URL du PDF
                    $pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true);
            ?>
                    <div class="swiper-slide">
                        <a class="event-card" href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url($event_image_url); ?>" alt="<?php echo esc_attr($event_name); ?>">
                            <div class="event-date"><?php echo esc_html($event_date); ?></div>
                            <div class="event-name"><?php echo esc_html($event_name); ?></div>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata(); // Réinitialise les données post
            else :
                echo '<p>Aucune soirée à thème trouvée.</p>';
            endif;
            ?>
        </div>
        <!-- Flèches de navigation ajoutées ici -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- Pagination si nécessaire -->
        <div class="swiper-pagination"></div>
    </div>
</section>



<section class="customers">
    <h2>Clients</h2>

    <h3 class="customers-review">Les derniers avis clients</h3>

    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

</section>

<section class="portfolio">
    <h2>Galerie</h2>
    <div class="container_desk">
        <!-- gallery -->
        <div class="gallery" style="position: relative; height: 556.984px;">

            <!-- gallery item -->
            <div class="items width2" style="position: absolute; left: 0px; top: 0px;">
                <div class="item-img">
                    <img src="<?= get_theme_file_uri('assets/images/poissoncarotte.svg') ?>" alt="image galerie 1">
                </div>
            </div>

            <!-- gallery item -->
            <div class="items width2" style="position: absolute; left: 292px; top: 0px;">
                <div class="item-img">
                    <img src="<?= get_theme_file_uri('assets/images/entree1.jpg') ?>" alt="image galerie 2">
                </div>
            </div>

            <!-- gallery item -->
            <div class="items width2" style="position: absolute; left: 585px; top: 0px;">
                <div class="item-img">
                    <img src="<?= get_theme_file_uri('assets/images/saumon_leg1.jpg') ?>" alt="image galerie 3">
                </div>
            </div>

            <!-- gallery item -->
            <div class="items" style="position: absolute; left: 292px; top: 292px;">
                <div class="item-img">
                    <img src="<?= get_theme_file_uri('assets/images/table.jpg') ?>" alt="image galerie 4">
                </div>
            </div>

            <!-- gallery item -->
            <div class="items width2" style="position: absolute; left: 877px; top: 0px;">
                <div class="item-img">
                    <img src="<?= get_theme_file_uri('assets/images/grenouillesjeje.svg') ?>" alt="image galerie 5">
                </div>
            </div>
        </div>
    </div>

    <div class="container_mobile">
    <div>
        <img src="<?= get_theme_file_uri('assets/images/dessertentreveyle.jpg') ?>" alt="image galerie restaurant">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/grenouillesjeje.svg') ?>" alt="image galerie grenouilles">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/bur.jpg') ?>" alt="image galerie burrata">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/1.jpg') ?>" alt="image galerie poisson">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/saumon_leg.jpg') ?>" alt="image galerie saumon">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/entree.jpg') ?>" alt="image galerie entrée">
        </div>
        <div>
        <img src="<?= get_theme_file_uri('assets/images/valentin.jpg') ?>" alt="image galerie foie gras">
        </div>
    </div>
</section>

<section id="contact" class="form">
    <h2>Contactez-nous</h2>

    <div class="text-contact">

        <p>Vous avez des questions, vous souhaitez en savoir plus sur notre restaurant ou simplement nous faire parvenir une demande de réservation ? </p>

        <p>Vous pouvez utiliser ce formulaire, nous contacter par email : <a href="mailto:nonoetco@hotmail.fr"><span>nonoetco@hotmail.fr</span></a> ou par téléphone : <a href="tel:+33385335028"><span>03.85.33.50.28</span></a></p>

        <p>Nous serons ravis de vous répondre dans les plus brefs délais.</p>

    </div>

    <div class="form-contact">

        <?php echo do_shortcode('[contact-form-7 id="71154e0" title="Contact"]'); ?>

        <div class="map-container">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2758.8039259955535!2d4.84820277668618!3d46.25412558038774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f365f3a26c1bb7%3A0xfc5b306d4938f3ed!2sL&#39;Entre%20Veyle!5e0!3m2!1sfr!2sfr!4v1725529095852!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
</section>

<?php get_footer(); ?>