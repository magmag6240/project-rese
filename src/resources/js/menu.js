
const menuButton = document.querySelector('.menu-button');
const menuNav = document.querySelector('.menu-nav');
const menuClose = document.querySelector('.menu-close');
const menuOpen = document.querySelector('.menu-open');
const body = document.querySelector('.body');

menuButton.addEventListener('click', function () {
	menuNav.classList.toggle('active');
	menuClose.classList.toggle('active');
	menuOpen.classList.toggle('active');
	body.classList.toggle('active');
});

