const showProfileAfterClick = () => {
  const profileButton = document.querySelector(".header-profile");
  const profileCard = document.querySelector(".header-profile-card");

  if (!profileButton || !profileCard) {
    return;
  }

  profileButton.addEventListener("click", () => {
    profileCard.classList.toggle("header-profile-card-active");
  });
};

export default showProfileAfterClick;
