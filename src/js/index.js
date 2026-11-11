import displayNavigation from "./components/navigation.js";
import showProfileAfterClick from "./components/profile.js";
import displayPasswordStrength from "./components/passwordStrength.js";

const init = () => {
  displayNavigation();
  showProfileAfterClick();
  displayPasswordStrength();
};

init();
