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
        slidesPerView: 1,
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
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        }
    });
});

jQuery(document).ready(function($) {
    $('.menu-buttons button').on('click', function() {
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
                $('#plats-grid').html(response);
                // Mettre à jour les catégories dynamiquement
                updateCategories(menu);
            }
        });
    });

    $(document).on('click', '.category-buttons button', function() {
        var category = $(this).data('category');
        var menu = $('.menu-buttons button.active').data('menu'); // Utilisez le menu actif

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
                $('#plats-grid').html(response);
            }
        });
    });

    // Ajouter une classe active aux boutons
    $('.menu-buttons button').on('click', function() {
        $('.menu-buttons button').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.category-buttons button', function() {
        $('.category-buttons button').removeClass('active');
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
                $('.category-buttons').html(response);
                // Déclencher automatiquement le clic sur "Entrée"
                $('.category-buttons button[data-category="entree"]').click();
            }
        });
    }
});

