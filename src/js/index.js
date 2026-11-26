import displayNavigation from "./components/navigation.js";
import showProfileAfterClick from "./components/profile.js";
import displayPasswordStrength from "./components/passwordStrength.js";
import showUsersModal from "./components/usersListModal.js";

const init = () => {
  displayNavigation();
  showProfileAfterClick();
  displayPasswordStrength();
  showUsersModal();
};

init();
