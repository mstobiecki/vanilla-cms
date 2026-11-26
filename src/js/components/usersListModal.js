const BODY_OPEN_CLASS = "users-modal-open";

const initFilters = () => {
  const form = document.querySelector("[data-users-filters]");

  if (!form) {
    return;
  }

  form.querySelectorAll("select").forEach((select) => {
    // Zmiana filtra zawsze wraca na pierwszą stronę, bo formularz nie zawiera parametru "page".
    select.addEventListener("change", () => form.requestSubmit());
  });
};

const initEditDialog = () => {
  const dialog = document.querySelector("#edit-user-dialog");

  // Starsze przeglądarki bez <dialog>: przycisk "Edytuj" po prostu nic nie robi.
  if (!dialog || typeof dialog.showModal !== "function") {
    return;
  }

  const form = dialog.querySelector("form");
  const submitButton = form.querySelector('button[type="submit"]');
  const idInput = dialog.querySelector("#edit-user-id");
  const idLabel = dialog.querySelector("#edit-user-id-label");
  const avatar = dialog.querySelector("#edit-user-avatar");
  const usernameInput = dialog.querySelector("#edit-user-username");
  const emailInput = dialog.querySelector("#edit-user-email");
  const roleSelect = dialog.querySelector("#edit-user-role");
  const statusSelect = dialog.querySelector("#edit-user-status");
  const selfHint = dialog.querySelector("[data-self-hint]");

  let lastTrigger = null;
  let pressStartedOnBackdrop = false;

  const fillForm = (data) => {
    const isSelf = data.self === "1";

    idInput.value = data.id;
    idLabel.textContent = data.id;
    avatar.textContent = data.username.charAt(0).toUpperCase();
    usernameInput.value = data.username;
    emailInput.value = data.email;
    roleSelect.value = data.role;
    statusSelect.value = data.status;

    // Admin nie może odebrać uprawnień ani zablokować samego siebie.
    roleSelect.disabled = isSelf;
    statusSelect.disabled = isSelf;
    selfHint.hidden = !isSelf;

    // Błędy z poprzedniego zapisu nie mają się pokazywać przy innym użytkowniku.
    dialog.querySelector("[data-form-errors]")?.remove();
  };

  const openDialog = () => {
    submitButton.disabled = false;
    document.body.classList.add(BODY_OPEN_CLASS);
    dialog.showModal();
  };

  // Delegacja zdarzeń: działa także dla wierszy, które pojawią się później.
  document.addEventListener("click", (event) => {
    const trigger = event.target.closest("[data-edit-user]");

    if (!trigger) {
      return;
    }

    lastTrigger = trigger;
    fillForm(trigger.dataset);
    openDialog();
  });

  dialog.querySelectorAll("[data-close-dialog]").forEach((button) => {
    button.addEventListener("click", () => dialog.close());
  });

  // Kliknięcie w tło zamyka modal, ale tylko gdy naciśnięcie zaczęło się na tle
  // (inaczej zaznaczanie tekstu w polu i puszczenie myszy poza oknem zamykałoby je przypadkiem).
  dialog.addEventListener("pointerdown", (event) => {
    pressStartedOnBackdrop = event.target === dialog;
  });

  dialog.addEventListener("click", (event) => {
    if (event.target === dialog && pressStartedOnBackdrop) {
      dialog.close();
    }
  });

  // Zdarzenie "close" wywoła się też po klawiszu Escape.
  dialog.addEventListener("close", () => {
    document.body.classList.remove(BODY_OPEN_CLASS);
    lastTrigger?.focus();
    lastTrigger = null;
  });

  // Blokada podwójnego wysłania formularza (zdarzenie nie odpali się, gdy walidacja HTML zawiedzie).
  form.addEventListener("submit", () => {
    submitButton.disabled = true;
  });

  // Po błędzie walidacji po stronie serwera PHP oznacza modal atrybutem data-open-on-load.
  if (dialog.hasAttribute("data-open-on-load")) {
    openDialog();
  }
};

const handleUsersPage = () => {
  initFilters();
  initEditDialog();
};

export default handleUsersPage;
