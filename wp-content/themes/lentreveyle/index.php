<?php get_header(); ?>

<div class="background-container">
    <div class="background-text">
        <h1>L'Entre Veyle</h1>

        <h3>Savourer l'authenticité de la cuisine maison</h3>

        <h5 class="background-text_small">
            Explorez nos menus variés et délicieux
        </h5>

        <div class="btn-header">
            <div class="border-btn border-menu">
                <a href="#" class="button-header_item btn-menu">Menus de la semaine</a>
            </div>
            <div class="border-btn border-menu">
                <a href="#" class="button-header_item btn-menu">Menus du week-end</a>
            </div>
        </div>
    </div>
</div>

<!--<section class="intro">
    <div class="intro-text flex">
        <h5 class="title-intro">Bienvenu à l'Entre Veyle</h5>

        <h2 class="title-intro_middle">
            Restaurant traditionnel <br />
            au coeur de Grièges
        </h2>

        <p>
            Dégustez une cuisine authentique et savoureuse à
            <span>L'Entre Veyle</span>. De nos grenouilles fraîches à nos
            délicieux plats de poulet à la crème avec morilles, notre menu regorge
            de <span>saveurs locales et familiales</span>. Venez découvrir nos
            plats variés et laissez-vous tenter par une expérience culinaire
            unique.
        </p>

        <div class="border-btn btn-contact">
            <a href="#" class="button-header_item btn-contact_item">Contactez-nous</a>
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
                    <img class="img-border img3" src="<?= get_theme_file_uri('assets/images/intro-img1.jpg')?>" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="menu-container">
    <div class="menu-container-text">
        <h6>Nos menus</h6>

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
</section>

<section class="team">
    <div class="container-team">
        <h6>Notre équipe</h6>
        <div class="presentation">
            <div class="part-team img">
                <img class="team-img" src="<?= get_theme_file_uri('assets/images/team.jpg') ?>" alt="photo d'équipe" />

            </div>
            <div class="part-team text">
                <h2 class="title-intro_middle">A propos de nous</h2>

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

                <div class="picto-access">
                    <img src="<?= get_theme_file_uri('assets/images/handicap.png') ?>" alt="acces handicap" />

                    <img src="<?= get_theme_file_uri('assets/images/terrasse1.png') ?>" alt="acces terrasse" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery">
    <h6>Galerie</h6>

    <div class="container-gallery">
        <div class="items img-gallery1">
            <img src="<?= get_theme_file_uri('assets/images/galerie1.jpg') ?>" alt="" />
        </div>
        <div class="items img-gallery2">
            <img src="<?= get_theme_file_uri('assets/images/galerie2.jpg') ?>" alt="" />
        </div>
        <div class="items img-gallery3">
            <img src="<?= get_theme_file_uri('assets/images/galerie3.jpg') ?>" alt="" />
        </div>
        <div class="items img-gallery4">
            <img src="<?= get_theme_file_uri('assets/images/galerie4.jpg') ?>" alt="" />
        </div>
        <div class="items img-gallery5">
            <img src="<?= get_theme_file_uri('assets/images/galerie5.jpg') ?>" alt="" />
        </div>
    </div>
</section>

<section class="customers">
    <h6>Clients</h6>

    <h2 class="customers-review">Les avis clients</h2>

    <div class="img1 valign">
        <img src="<?= get_theme_file_uri('assets/images/intro-img1.jpg') ?>" alt="" />
    </div>
</section>

<?php get_footer(); ?>