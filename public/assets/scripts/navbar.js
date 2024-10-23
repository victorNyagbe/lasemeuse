const navbarIconContainer = document.querySelector('.navbar-icon-container');
const navbarIcon = document.querySelector('.navbar-icon');
const navbarMenu = document.querySelector('.navbar-menu');

navbarIconContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains('fa-bars')) {
        navbarIcon.classList.toggle("fa-times")
    } else {
        navbarIcon.classList.toggle("fa-bars")
    }

    navbarMenu.classList.toggle("active");
})
