const displayNavigation = () => {
    const navigationWrapper = document.querySelector('.header-navigation-wrapper'); 
    const navigationButton = document.querySelector('.header-hamburger-button'); 
    const navigationLinks = document.querySelectorAll('.header-navigation-link'); 

    const handleNavigation = () => {
        navigationWrapper.classList.toggle('header-navigation-open');
    }

    navigationButton.addEventListener('click', handleNavigation); 
    navigationLinks.forEach((link) => link.addEventListener('click', handleNavigation)); 
};

export default displayNavigation;