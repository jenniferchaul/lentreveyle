<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="L'Entre Veyle, restaurant traditionnel à Grièges, propose une cuisine locale et savoureuse. Dégustez nos spécialités comme les grenouilles fraîches. N'héistez pas à consulter nos différents menus. Nous vous proposons une carte pour la semaine et une deuxième pour le week-end. Accueil chaleureux par Bruno et Corinne, ouvert du mardi au dimanche midi, et les soirs de week-end sur réservation. Terrasse ombragée et accès PMR.">

    <meta property="og:title" content="L'Entre Veyle - Restaurant traditionnel à Grièges" />
    <meta property="og:description" content="Dégustez une cuisine pleine de caractère à L'Entre Veyle. Nos grenouilles fraîches et notre poulet à la crème avec morilles raviront vos papilles." />
    <meta property="og:image" content="<?= get_theme_file_uri('assets/images/logo.png') ?>">
    <meta property="og:image:alt" content="Logo de L'Entre Veyle" />
    <meta property="og:url" content="https://lentreveyle.fr" />
    <meta property="og:type" content="website" />
    <meta name="keywords" content="restaurant, cuisine locale, Grièges, grenouilles fraîches, poulet à la crème" />
    <meta name="author" content="Bruno et Corinne" />


    <!-- Styles and Fonts -->
    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Rgfsq/NgHpDj2c+6a2byjU4FNM9AsiUQ/uzY20BMLpExsfNK9OTx9yGh0U3gMsavZg54MUmIHmCNzEX3KmEn7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Pinyon+Script&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Rgfsq/NgHpDj2c+6a2byjU4FNM9AsiUQ/uzY20BMLpExsfNK9OTx9yGh0U3gMsavZg54MUmIHmCNzEX3KmEn7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/ad03fc9582.js" crossorigin="anonymous"></script>

</head>

<body>

    <<div class="progress-wrap cursor-pointer active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 279.019;"></path>
        </svg>
        </div>

        <header>

            <nav class="navbar">
                <div class="container">
                    <a class="logo" href="<?= home_url('/') ?>">
                        <img class="img-logo" src="<?= get_theme_file_uri('assets/images/lentreveyle.png') ?>" alt="logo">
                    </a>
                    <div class="navbar-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link underline active" href="<?= home_url('/') ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline services-menu" href="#">Menus <span><i class="fas fa-angle-down"></i></span> </a>
                                <div class="sub-menu">
                                    <ul>
                                        <li><a href="<?= home_url('/tous-les-plats') ?>">Menu Semaine</a></li>
                                        <li><a href="<?= home_url('/tous-les-plats') ?>">Menu Week-end</a></li>
                                        <li><a href="<?= home_url('/#event') ?>">Menus à thème</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline" href="<?= home_url('/#team') ?>">Notre équipe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link underline" href="<?= home_url('/#contact') ?>">Contact</a>
                            </li>
                            <li class="nav-item"><a class="nav-link mail" href="mailto:nonoetco@hotmail.fr">nonoetco@hotmail.fr</a></li>
                            <li class="nav-item"><a class="nav-link phone" href="tel:+33385335028">03 85 33 50 28</a></li>
                        </ul>
                    </div><a class="toggle" href="#">
                        <img class="img-toggle menu-icon" src="<?= get_theme_file_uri('assets/images/menu.png') ?>" alt="icon menu">
                        <img class="img-toggle close-icon" src="<?= get_theme_file_uri('assets/images/crossburger.png') ?>" alt="icon cross">
                    </a>
                </div>
            </nav>

        </header>

        <?php

        wp_head();
