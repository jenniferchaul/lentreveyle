const btn = document.querySelector('.btn');

btn.addEventListener('click', () => {

    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })

})

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.toggle');
    const navbarContent = document.querySelector('.navbar-content');
    const menuIcon = document.querySelector('.menu-icon');
    const closeIcon = document.querySelector('.close-icon');

    toggleButton.addEventListener('click', function (e) {
        e.preventDefault();
        navbarContent.classList.toggle('show');
        menuIcon.classList.toggle('hide');
        closeIcon.classList.toggle('hide');
    });
});
