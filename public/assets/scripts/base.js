// const closeModal = document.querySelector('.closeModal');

// closeModal.addEventListener("click", function (e) {
//     const modalContainer = this.closest(".modal__container");

//

// });

const closeModal = (element) => {
    const modalContainer = element.closest(".modal__container");
    modalContainer.style.display = "none";
}

// const sidebarDropdownMenu = document.querySelector('.dropdown-menu');

// sidebarDropdownMenu.addEventListener("click", function (e) {
//     e.preventDefault();
//     this.classList.toggle('active')
//     console.log(this);

// });

const closeAlert = (element) => {
    const alertContainer = element.parentNode;

    alertContainer.style.display = "none";
}

