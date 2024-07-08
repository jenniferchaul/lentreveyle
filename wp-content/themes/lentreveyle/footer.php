<footer>
    <div class="container">
        <div class="row-social">
            <div class="logo">
                <a class="logo" href="<?= home_url('/hero') ?>">
                    <img class="img-logo" src="<?= get_theme_file_uri('assets/images/lentreveyle.png') ?>" alt="logo">
                </a>
            </div>

            <div class="social">
                <a href="#">
                    <img src="<?= get_theme_file_uri('assets/images/facebook-24.png') ?>" alt="link facebook">
                </a>
                <a href="#">
                    <img src="<?= get_theme_file_uri('assets/images/tripadvisor-24.png') ?>" alt="link tripadvisor">
                </a>
            </div>
        </div>

        <div class="row-adress">
            <div class="col">
                <h3>Contactez-nous</h3>
                <ul>
                    <li>
                        <div class="title">
                            Téléphone
                        </div>
                        <div class="dots"></div>
                        <span>
                            03.85.33.50.28
                        </span>
                    </li>

                    <li>
                        <div class="title">
                            email
                        </div>
                        <div class="dots"></div>
                        <span>
                            nonoetco@hotmail.fr
                        </span>
                    </li>

                    <li>
                        <div class="title">
                            Adresse
                        </div>
                        <div class="dots"></div>
                        <span>
                            01290 Grièges
                        </span>
                    </li>
                </ul>
            </div>

            <div class="col">
                <h3>Horaires d'ouverture</h3>

                <ul>
                    <li>
                        <div class="title">
                            Mardi au vendredi
                        </div>
                        <div class="dots"></div>
                        <span>
                            11:00 - 15:00
                        </span>
                    </li>

                    <li>
                        <div class="title">
                            Samedi
                        </div>
                        <div class="dots"></div>
                        <span>
                            19:00 - 22:00
                        </span>
                    </li>

                    <li>
                        <div class="title">
                            Lundi
                        </div>
                        <div class="dots"></div>
                        <span>
                            Fermé
                        </span>
                    </li>
                </ul>

            </div>

            <div class="col">
                <h3>Newsletter</h3>
                <p>Abonnez-vous à notre newsletter et recevez les dernières nouvelles et nos événements à venir directement dans votre boite mail</p>
                <?php echo do_shortcode('[wpforms id="12" title="false"]');
                ?>
            </div>
        </div>


        <div class="ftail">
            <div class="container">
                <div class="copyrights text-center mt-0">
                    <p>© 2024, L'Entre Veyle. Réalisé par <a href="www.jcdevandcode.fr">JC Dev&Code</a>.</p>
                    <div class="legale-notices">
                        <ul>
                            <li>
                                <a href="https://www.jcdevandcode.fr/mentions-legales">Mentions légales - </a>
                            </li>
                            <li>
                                <a href="https://www.jcdevandcode.fr/politique-de-confidentialite">Politique de confidentialité</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>

<?php
wp_footer();
