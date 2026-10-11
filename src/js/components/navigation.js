const displayNavigation = () => {
    const navigationWrapper = document.querySelector('.header-navigation-wrapper'); 
    const navigationButton = document.querySelector('.header-navigation-hamburger'); 
    const navigationLinks = document.querySelectorAll('.header-navigation-link'); 
    const navigationCloseButton = document.querySelector('.header-navigation-close-button');

    const desktopQuery = window.matchMedia('(min-width: 75em)');

    const handleNavigation = () => {
        if (desktopQuery.matches) {
            return;
        }
        navigationWrapper.classList.toggle('header-navigation-open');
    }
  
    navigationButton.addEventListener('click', handleNavigation); 
    navigationCloseButton.addEventListener('click', handleNavigation);

    navigationLinks.forEach((link) => link.addEventListener('click', handleNavigation)); 
};

export default displayNavigation;