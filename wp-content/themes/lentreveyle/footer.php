<footer>
    <div class="container">
        <div class="row-social">
            <div class="logo">
                <a class="logo" href="<?= home_url('/') ?>">
                    <img class="img-logo" src="<?= get_theme_file_uri('assets/images/lentreveyle.png') ?>" alt="logo">
                </a>
            </div>

            <div class="social">
                <a href="https://www.facebook.com/lentre.veyle" target="_blank" rel="noopener noreferrer">
                    <img class="facebook" src="<?= get_theme_file_uri('assets/images/facebook-24.png') ?>" alt="link facebook">
                </a>
                <a href="https://www.tripadvisor.fr/Restaurant_Review-g6826477-d7078128-Reviews-L_Entre_Veyle-Grieges_Ain_Auvergne_Rhone_Alpes.html" target="_blank" rel="noopener noreferrer">
                    <img class="tripadvisor" src="<?= get_theme_file_uri('assets/images/tripadvisor-24.png') ?>" alt="link tripadvisor">
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
                            Email
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
                            17 Rue Marie Joseph Bonnat - 01290 Grièges
                        </span>
                    </li>
                </ul>
            </div>

            <div class="col">
                <h3>Horaires d'ouverture</h3>

                <ul>
                    <li>
                        <div class="title">
                            Mardi au vendredi - Dimanche
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
                            Nous consulter
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
