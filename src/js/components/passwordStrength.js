const MIN_PASSWORD_LENGTH = 8;
const LONG_PASSWORD_LENGTH = 12;

const calculatePasswordStrength = (password) => {
  if (password.length === 0) {
    return 0;
  }

  if (password.length < MIN_PASSWORD_LENGTH) {
    return 1;
  }

  const characterTypes = [/\p{Ll}/u, /\p{Lu}/u, /\p{Nd}/u, /[^\p{L}\p{N}]/u];

  const usedTypes = characterTypes.filter((type) => type.test(password)).length;

  let strength = 2;

  if (password.length >= LONG_PASSWORD_LENGTH) {
    strength += 1;
  }

  if (usedTypes >= 3) {
    strength += 1;
  }

  return strength;
};

const displayPasswordStrength = () => {
  const passwordInput = document.querySelector("#new-password");
  const strengthBars = document.querySelectorAll(".profile-strength-bar");

  if (!passwordInput || strengthBars.length === 0) {
    return;
  }

  const updateStrength = () => {
    const strength = calculatePasswordStrength(passwordInput.value);
    const level = strength >= 3 ? "strong" : "weak";

    strengthBars.forEach((element, index) => {
      element.classList.remove(
        "profile-strength-bar-weak",
        "profile-strength-bar-strong",
      );

      if (index < strength) {
        element.classList.add(`profile-strength-bar-${level}`);
      }
    });
  };

  passwordInput.addEventListener("input", updateStrength);
  updateStrength();
};

export default displayPasswordStrength;
