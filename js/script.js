$(document).ready(function(){
    $('.slider').slick({
        arrows: true,
        dots: true,
        draggable: false,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 8000,
        appendArrows:$('.org .interface .arrows'),
        appendDots:$('.org .interface .dots')
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const loginButton = document.getElementById('loginButton');
    const overlay = document.getElementById('overlay');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const toRegister = document.getElementById('toRegister');
    const toLogin = document.getElementById('toLogin');

    function openModal(modal) {
        overlay.classList.add('active');
        modal.classList.add('active');
    }

    function closeModal() {
        overlay.classList.remove('active');
        loginModal.classList.remove('active');
        registerModal.classList.remove('active');
    }

    loginButton.addEventListener('click', (e) => {
        e.preventDefault();
        openModal(loginModal);
    });

    toRegister.addEventListener('click', () => {
        closeModal();
        openModal(registerModal);
    });

    toLogin.addEventListener('click', () => {
        closeModal();
        openModal(loginModal);
    });

    overlay.addEventListener('click', closeModal);
});
