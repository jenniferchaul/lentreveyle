document.addEventListener('DOMContentLoaded', function () {
    "use strict";

    // Navbar toggle functionality
    const toggleButton = document.querySelector('.toggle');
    const navbarContent = document.querySelector('.navbar-content');
    const menuIcon = document.querySelector('.menu-icon');
    const closeIcon = document.querySelector('.close-icon');

    if (toggleButton) {
        toggleButton.addEventListener('click', function (e) {
            e.preventDefault();
            navbarContent.classList.toggle('show');
            menuIcon.classList.toggle('hide');
            closeIcon.classList.toggle('hide');
        });
    }

    // Progress bar functionality
    var progressWrap = document.querySelector('.progress-wrap');
    var progressPath = document.querySelector('.progress-wrap path');
    if (progressPath) {
        var pathLength = progressPath.getTotalLength();

        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

        var updateProgress = function () {
            var scroll = window.pageYOffset;
            var height = document.documentElement.scrollHeight - window.innerHeight;
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        };

        updateProgress();
        window.addEventListener('scroll', updateProgress);

        var offset = 150;
        var duration = 550;

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > offset) {
                progressWrap.classList.add('active-progress');
            } else {
                progressWrap.classList.remove('active-progress');
            }
        });

        progressWrap.addEventListener('click', function (event) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

// Swiper initialization
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1, // Une seule carte visible sur mobile par défaut
    spaceBetween: 10,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        // A partir de 640px
        640: {
            slidesPerView: 1, // Toujours une seule carte jusqu'à 640px
            spaceBetween: 10,
        },
        // A partir de 768px
        768: {
            slidesPerView: 2, // Deux cartes à partir de 768px
            spaceBetween: 20,
        },
        // A partir de 1024px
        1024: {
            slidesPerView: 3, // Trois cartes à partir de 1024px
            spaceBetween: 30,
        },
        // A partir de 1200px
        1200: {
            slidesPerView: 4, // Quatre cartes à partir de 1200px
            spaceBetween: 40,
        },
    }
});

});

jQuery(document).ready(function($) {
    // Clic sur une card de menu
    $('.cards-bx').on('click', '.card', function(e) {
        e.preventDefault();
        var menu = $(this).data('menu');
        var menuTitle = $(this).find('.card-title').text(); // Récupère le titre de la card

        var data = {
            action: 'filter_posts',
            menu: menu
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.trim() !== '<p>Aucun plat trouvé.</p>') {
                    $('#plats-grid').html(response).removeClass('empty').addClass('has-plats').show();
                } else {
                    $('#plats-grid').html(response).addClass('empty').removeClass('has-plats').hide();
                }
                // Mettre à jour les catégories dynamiquement
                updateCategories(menu);

                // Défilement vers les catégories et plats
                var offset = $('#categories-anchor').offset().top - 100; // Ajustez le décalage ici
                $('html, body').animate({
                    scrollTop: offset
                }, 500); // La durée du défilement en millisecondes

                // Mettre à jour le titre du menu sélectionné
                $('.selected-menu-title').text(menuTitle);
            }
        });

        // Ajouter une classe active aux cards
        $('.card').removeClass('active');
        $(this).addClass('active');
    });

    // Clic sur une catégorie
    $(document).on('click', '.category-links a', function(e) {
        e.preventDefault();
        var category = $(this).data('category');
        var menu = $('.card.active').data('menu'); // Utilisez le menu actif

        var data = {
            action: 'filter_posts',
            menu: menu,
            category: category
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                if(response.trim() !== '<p>Aucun plat trouvé.</p>') {
                    $('#plats-grid').html(response).removeClass('empty').addClass('has-plats').show();
                } else {
                    $('#plats-grid').html(response).addClass('empty').removeClass('has-plats').hide();
                }
            }
        });

        // Ajouter une classe active aux liens de catégories
        $('.category-links a').removeClass('active');
        $(this).addClass('active');
    });

    // Fonction pour mettre à jour les catégories
    function updateCategories(menu) {
        var data = {
            action: 'get_categories',
            menu: menu
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                $('.category-links').html(response);
                // Déclencher automatiquement le clic sur "Entrée"
                $('.category-links a[data-category="entrees"]').click();
            }
        });
    }
});

jQuery(document).ready(function($) {
    // Function to handle menu button click
    $('.cards-bx .card').on('click', function(e) {
        e.preventDefault();
        $('.cards-bx .card').removeClass('active');
        $(this).addClass('active');
        $('.cards-bx .card-title').removeClass('active'); // Remove active class from all h3
        $(this).find('.card-title').addClass('active'); // Add active class to clicked h3

        var menu = $(this).data('menu');

        var data = {
            action: 'filter_posts',
            menu: menu
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                if (response.trim() !== '<p>Aucun plat trouvé.</p>') {
                    $('#plats-grid').html(response).removeClass('empty').addClass('has-plats').show();
                } else {
                    $('#plats-grid').html(response).addClass('empty').removeClass('has-plats').hide();
                }
                // Update categories dynamically
                updateCategories(menu);

                // Scroll to categories and plats
                var offset = $('#categories-anchor').offset().top - 100; // Adjust offset here
                $('html, body').animate({
                    scrollTop: offset
                }, 500); // Scroll duration in milliseconds
            }
        });
    });

    // Function to handle category link click
    $(document).on('click', '.category-links a', function(e) {
        e.preventDefault();
        $('.category-links a').removeClass('active');
        $(this).addClass('active');

        var category = $(this).data('category');
        var menu = $('.cards-bx .card.active').data('menu');

        // Hide all formula contents when a category is clicked
        hideAllFormulas();

        if (category === 'formule-entre-veyle' || category === 'menu-du-jour' || category === 'menu-enfant' ||
            category === 'menu-entre-veyle' || category === 'menu-grenouilles' || category === 'menu-gourmand' || category === 'soiree-creole') {
            displayStaticMenu(category);
            return;
        }

        var data = {
            action: 'filter_posts',
            menu: menu,
            category: category
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                if (response.trim() !== '<p>Aucun plat trouvé.</p>') {
                    $('#plats-grid').html(response).removeClass('empty').addClass('has-plats').show();
                } else {
                    $('#plats-grid').html(response).addClass('empty').removeClass('has-plats').hide();
                }
            }
        });
    });

    // Function to display static menus
    function displayStaticMenu(category) {
        $('.formule-content').hide(); // Hide all formula contents
        $('#' + category).show(); // Show the selected formula content
    }

    // Function to hide all formula contents
    function hideAllFormulas() {
        $('.formule-content').hide();
    }

    // Function to update categories
    function updateCategories(menu) {
        var data = {
            action: 'get_categories',
            menu: menu
        };

        $.ajax({
            url: ajax_filter_params.ajax_url,
            data: data,
            type: 'POST',
            success: function(response) {
                $('.category-links').html(response);
                // Automatically click the first category
                $('.category-links a').first().click();
            }
        });
    }
});

//jQuery(document).ready(function($) {
//    // Charger les catégories de boissons
//    function loadCategories() {
//        var data = {
//            action: 'get_boisson_categories'
//        };
//
//        $.ajax({
//            url: ajax_filter_params.ajax_url,
//            data: data,
//            type: 'POST',
//            success: function(response) {
//                $('.category-links').html(response);
//            }
//        });
//    }
//
//    // Charger les boissons en fonction de la catégorie sélectionnée
//    $('.category-links').on('click', 'a', function(e) {
//        e.preventDefault();
//        var category = $(this).data('category');
//
//        var data = {
//            action: 'filter_boissons',
//            category: category
//        };
//
//        $.ajax({
//            url: ajax_filter_params.ajax_url,
//            data: data,
//            type: 'POST',
//            success: function(response) {
//                $('#boissons-grid').html(response).removeClass('empty').addClass('has-boissons').show();
//            }
//        });
//
//        // Ajouter la classe active
//        $('.category-links a').removeClass('active');
//        $(this).addClass('active');
//    });
//
//    // Initialiser en chargeant les catégories
//    loadCategories();
//});
