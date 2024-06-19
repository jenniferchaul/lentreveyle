<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Si vous voulez manger un repas français et recherchez un restaurant où passer la soirée, vous êtes les bienvenus chez nous. Profitez des journées ensoleillées dans notre terrasse décontractée. Restaurant avec une offre de boissons variée: Notre cuisine française vous offre une variété de recettes savoureuses et fraîchement préparées. Laissez-vous tenter par nos spécialités et nos boissons. Les excellents plats du terroir et les plats régionaux variés feront plaisir à tout le monde. Nos desserts divins vous séduiront le temps d’une pause. : D’ailleurs, vous pouvez aussi venir chez nous en voiture ; nous avons des places de parking gratuites pour vous. Notre restaurant est accessible aux personnes à mobilité réduite. Passez nous voir pendant nos horaires d’ouverture. Nous nous ferons un plaisir de vous accueillir ! Vous pouvez payer par carte VISA, paiement sans contact, MasterCard, chèque-vacances ou chèque. Bien évidemment, nous acceptons aussi les paiements en espèces.&nbsp; Nous sommes ouverts tous les jours sauf le lundi.">
    <meta property="og:description" content="Si vous voulez manger un repas français et recherchez un restaurant où passer la soirée, vous êtes les bienvenus chez nous. Profitez des journées ensoleillées dans notre terrasse décontractée. Restaurant avec une offre de boissons variée: Notre cuisine française vous offre une variété de recettes savoureuses et fraîchement préparées. Laissez-vous tenter par nos spécialités et nos boissons. Les excellents plats du terroir et les plats régionaux variés feront plaisir à tout le monde. Nos desserts divins vous séduiront le temps d’une pause. : D’ailleurs, vous pouvez aussi venir chez nous en voiture ; nous avons des places de parking gratuites pour vous. Notre restaurant est accessible aux personnes à mobilité réduite. Passez nous voir pendant nos horaires d’ouverture. Nous nous ferons un plaisir de vous accueillir ! Vous pouvez payer par carte VISA, paiement sans contact, MasterCard, chèque-vacances ou chèque. Bien évidemment, nous acceptons aussi les paiements en espèces.&nbsp; Nous sommes ouverts tous les jours sauf le lundi.">

    <!-- Styles and Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Rgfsq/NgHpDj2c+6a2byjU4FNM9AsiUQ/uzY20BMLpExsfNK9OTx9yGh0U3gMsavZg54MUmIHmCNzEX3KmEn7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Pinyon+Script&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ad03fc9582.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="btn">
        <img src="<?= get_theme_file_uri('assets/images/arrow.png') ?>" alt="arrow-scroll">
    </div>

    <header>
        <nav class="navbar">
            <div class="container">
                <a class="logo"> href="<?= home_url('/hero') ?>"
                    <img class="img-logo" src="<?= get_theme_file_uri('assets/images/logo.png') ?>" alt="logo">
                </a>

                <!-- Menu de navigation -->
                <div id="menu" class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= home_url('/hero') ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= home_url('/menus') ?>">Menus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= home_url('/#propos') ?>">à propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= home_url('/contact') ?>">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mail" href="mailto:nonoetco@gmail.fr">nonoetco@gmail.com</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link phone" href="tel:+33661246520">03 85 33 50 28</a>
                        </li>
                    </ul>
                </div>

                <a class="toggle" href="#">
                    <img class="img-toggle menu-icon" src="<?= get_theme_file_uri('assets/images/menu.png') ?>" alt="icon menu">
                    <img class="img-toggle close-icon" src="<?= get_theme_file_uri('assets/images/crossburger.png') ?>" alt="icon cross">
                </a>
            </div>
        </nav>
    </header>

    <?php

    wp_head();
