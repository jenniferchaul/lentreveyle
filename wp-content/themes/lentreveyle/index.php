<?php get_header(); ?>

<section id="hero" class="hero">

    <div class="hero-presentation">

        <h1>L'Entre Veyle</h1>

        <h2>Savourer l'authenticité de la cuisine maison</h2>

        <h3>
            Explorez nos menus variés et délicieux
        </h3>

        <div>

            <a href="#" class="hero-btn">
                <span>Menu de la semaine</span>
                <i>
                </i>
            </a>

            <a href="#" class="hero-btn">
                <span>Menu du week-end</span>
                <i>

                </i>
            </a>

        </div>

</section>

<section class="intro">
    <div class="intro-text flex">
        <h2 class="title-intro">Bienvenu à l'Entre Veyle</h>

            <h3 class="title-intro_middle">
                Restaurant traditionnel <br />
                au coeur de Grièges
            </h3>

            <p>
                Dégustez une cuisine authentique et savoureuse à
                <span>L'Entre Veyle</span>. De nos grenouilles fraîches à notre
                délicieux plat de poulet à la crème avec morilles, nos menus regorgent
                de <span>saveurs locales et familiales</span>. Venez découvrir nos
                plats variés et laissez-vous tenter par une expérience culinaire
                unique.
            </p>

            <div>
                <a href="#" class="hero-btn">
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
                    <img class="img-border img1" src="<?= get_theme_file_uri('assets/images/intro-img2.jpg') ?>" alt="" />
                </div>
                <div>
                    <img class="img-border img2" src="<?= get_theme_file_uri('assets/images/intro-img3.jpg') ?>" alt="" />
                </div>
            </div>
            <div class="intro-img_right">
                <div>
                    <img class="img-border img3" src="<?= get_theme_file_uri('assets/images/intro-img1.jpg') ?>" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<!--<section class="menu-container">
    <div class="menu-container-text">
        <h2>Nos menus</h2>

        <div class="container-menu-img">
            <div class="container-menu">
                <a href="#">
                    <img class="menu-img dish" src="<?= get_theme_file_uri('assets/images/poisson.jpg') ?>" />

                    <h3 class="subtitle-menu">La carte</h3>
                </a>
            </div>

            <div class="container-menu">
                <a href="#">
                    <img class="menu-img" src="<?= get_theme_file_uri('assets/images/boissons.jpg') ?>" />

                    <h3 class="subtitle-menu">Les boissons</h3>
                </a>
            </div>
        </div>
    </div>
</section>-->

<section class="boxes">
    <div class="container">
        <h2>Nos menus</h2>
        <div class="grid-bx">
            <div class="box box1">
                <div class="img-box">
                    <img src="<?= get_theme_file_uri('assets/images/poisson.jpg') ?>" alt="La Maison de Bois - Manger">
                </div>
                <h3 class="box-title black">La carte</h3>
                <p><a href="/fr/carte-restaurant-traditionnel--menu-brasserie-moderne">link</a></p>
            </div>

            <div class="box box2">
                <div class="img-box">
                    <img src="<?= get_theme_file_uri('assets/images/boissons.jpg') ?>" alt="La Maison de Bois - Boire">
                </div>
                <h3 class="box-title white">Les boissons</h3>
                <p><a href="/fr/carte-bar--carte-cocktails">link</a></p>
            </div>
        </div>
    </div>
</section>

<section class="team">
    <div class="container-team">
        <h2>Notre équipe</h2>
        <div class="presentation">
            <div class="part-team text">
                <h3 class="title-intro_middle">A propos de nous</h3>

                <p class="text-about-us">
                    Dans l'atmosphère chaleureuse de leur établissement,
                    <span>Bruno et Corinne</span> vous ouvrent les portes de leur
                    <span>restaurant l'Entre Veyle</span> avec un accueil des plus
                    sincères. Forts d'une passion commune pour la cuisine et le
                    partage, ils conjuguent leurs talents pour vous offrir un moment
                    authentique, où convivialité et plaisir gustatif sont au
                    rendez-vous.

                    <br />
                    <br />

                    Le restaurant est ouvert du mardi au vendredi pour le service du midi, ainsi que le dimanche midi. Le restaurant est également ouvert les vendredis et samedis soir sur réservation.

                    <br />
                    <br />

                    Le restaurant est entièrement accessible aux personnes à mobilité réduite. Il dispose aussi d'une grande terrasse ombragée.

                    <br />
                    <br />



                </p>

            </div>

            <?php echo do_shortcode("[fdm-menu id='30']"); ?>


            <div class="part-team img">
                <img class="team-img" src="<?= get_theme_file_uri('assets/images/team.jpg') ?>" alt="photo d'équipe" />

            </div>
        </div>
    </div>
</section>

<section class="gallery">
    <h2>Galerie</h2>

    <div class="container-gallery">
        <div class="items">
            <img class="img-gallery1" src="<?= get_theme_file_uri('assets/images/galerie1.jpg') ?>" alt="" />
        </div>
        <div class="items">
            <img class="img-gallery2" src="<?= get_theme_file_uri('assets/images/galerie2.jpg') ?>" alt="" />
        </div>
        <div class="items">
            <img class="img-gallery3" src="<?= get_theme_file_uri('assets/images/galerie3.jpg') ?>" alt="" />
        </div>
        <div class="items">
            <img class="img-gallery4" src="<?= get_theme_file_uri('assets/images/galerie4.jpg') ?>" alt="" />
        </div>
        <div class="items">
            <img class="img-gallery5" src="<?= get_theme_file_uri('assets/images/galerie5.jpg') ?>" alt="" />
        </div>
    </div>
</section>

<section class="customers">
    <h2>Clients</h2>

    <h3 class="customers-review">Les avis clients</h3>

    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

</section>

<!--<section class="events">
    <h2>Nos événements</h2>
    <p>À L'Entre Veyle, nous aimons célébrer les occasions spéciales avec vous. Rejoignez-nous pour nos soirées à thème et événements spéciaux :</p>
    <ul>
        <li><strong>Soirée Moules Frites :</strong> Une soirée conviviale avec des moules frites à volonté.</li>
        <li><strong>Repas Créoles :</strong> Plongez dans les saveurs des îles avec nos repas créoles.</li>
        <li><strong>Repas de Fête :</strong> Célébrez la fête des Pères, des Mères ou la Saint-Valentin avec nos menus spéciaux.</li>
    </ul>
    <p>Pour connaître les dates et réserver votre place, contactez-nous dès maintenant !</p>
</section>-->

<section class="events-carousel">
    <h2>Nos événements</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a class="event-card" href="url_to_event_grenouilles">
                    <img src="<?= get_theme_file_uri('assets/images/grenouilles.jpg') ?>" alt="Soirée Moules Frites">
                    <div class="event-date">15 Juillet 2024</div>
                    <div class="event-name">Soirée Grenouilles Frites</div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="event-card" href="url_to_event_creole">
                    <img src="<?= get_theme_file_uri('assets/images/creole.jpg') ?>" alt="Soirée Créole">
                    <div class="event-date">31 Juillet 2024</div>
                    <div class="event-name">Soirée Créole</div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="event-card" href="url_to_event_mothers_day">
                    <img src="<?= get_theme_file_uri('assets/images/entree.jpg') ?>" alt="Soirée Grenouilles">
                    <div class="event-date">15 Août 2024</div>
                    <div class="event-name">Fête des mères</div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="event-card" href="url_to_event_fathers_day">
                    <img src="<?= get_theme_file_uri('assets/images/plat.jpg') ?>" alt="Fête des Pères">
                    <div class="event-date">15 Mai 2024</div>
                    <div class="event-name">Fête des Pères</div>
                </a>
            </div>
            <div class="swiper-slide">
                <a class="event-card" href="url_to_event_valentin">
                    <img src="<?= get_theme_file_uri('assets/images/valentin.jpg') ?>" alt="Saint Valentin">
                    <div class="event-date">14 Février 2024</div>
                    <div class="event-name">Saint Valentin</div>
                </a>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>


<section class="form">

    <h2>Contactez-nous</h2>

    <p>Vous avez des questions, vous souhaitez en savoir plus sur notre restaurant ou simplement nous faire parvenir une demande de réservation ? </p>

    <p>Vous pouvez utiliser ce formulaire, nous contacter par email : <span>contact@jcdevandcode.fr</span> ou par téléphone : <span>06.61.24.65.20</span></p>

    <p>Nous serons ravis de vous répondre dans les plus brefs délais.</p>

    <?php echo do_shortcode('[wpforms id="9" title="false"]'); ?>





</section>





<?php get_footer(); ?>