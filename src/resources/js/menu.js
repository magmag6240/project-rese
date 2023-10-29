
const menuButton = document.querySelector('.menu-button');
const menuNav = document.querySelector('.menu-nav');
const menuClose = document.querySelector('.menu-close');
const menuOpen = document.querySelector('.menu-open');

menuButton.addEventListener('click', function () {
	menuNav.classList.toggle('active');
	menuClose.classList.toggle('active');
	menuOpen.classList.toggle('active');
});