<main>
    <section class="profile">
        <div class="container">
            <header class="profile-title-wrapper">
                <span class="profile-letter">M</span>
                <div class="profile-title-content">
                    <span class="profile-account">Twoje konto</span>
                    <h1 class="profile-title-heading">Mój <span class="profile-title-heading-special">profil</span></h1>
                </div>
            </header>
            <div class="profile-card-wrapper">
                <div class="profile-card">
                    <header class="profile-card-description">
                        <h3 class="profile-card-heading">Dane konta</h3>
                        <p class="profile-card-paragraph">Zmień nazwę użytkownika lub adres e-mail powiązany z kontem.
                        </p>
                    </header>
                    <div class="auth-errors" role="alert">
                        <p class="auth-error">
                            <i class="auth-error-icon fa-solid fa-circle-exclamation"></i>
                            Konto z takim adresem e-mail już istnieje.
                        </p>
                    </div>
                    <form class="profile-form" action="#" method="POST">
                        <div class="auth-field">
                            <label class="auth-label" for="username">Nazwa użytkownika</label>
                            <input class="auth-input" type="text" id="username" name="username"
                                placeholder="Podaj nazwę użytkownika" autocomplete="username" />
                        </div>
                        <div class="auth-field">
                            <label class="auth-label" for="email">Adres e-mail</label>
                            <input class="auth-input" type="email" id="email" name="email"
                                placeholder="jan.kowalski@example.com" autocomplete="email" required />
                        </div>
                        <div class="auth-field">
                            <label class="auth-label" for="account-password">Hasło</label>
                            <input class="auth-input" type="password" id="account-password" name="password"
                                placeholder="Wpisz swoje hasło" autocomplete="current-password" required />
                            <span class="profile-password-required">Wymagane do potwierdzenia zmiany adresu
                                e-mail.</span>
                        </div>
                        <button class="auth-button" type="submit">Zapisz zmiany</button>
                    </form>
                </div>
                <div class="profile-card">
                    <header class="profile-card-description">
                        <h3 class="profile-card-heading">Zmiana hasła</h3>
                        <p class="profile-card-paragraph">Użyj minimum 8 znaków. Po zmianie hasła pozostaniesz
                            zalogowany.
                        </p>
                    </header>
                    <div class="auth-errors" role="alert">
                        <p class="auth-error">
                            <i class="auth-error-icon fa-solid fa-circle-exclamation"></i>
                            Wprowadzone hasła nie są takie same.
                        </p>
                    </div>
                    <form class="profile-form" action="#" method="POST">
                        <div class="auth-field">
                            <label class="auth-label" for="current-password">Aktualne hasło</label>
                            <div class="profile-password">
                                <input class="auth-input" type="password" id="current-password" name="current-password"
                                    placeholder="Wpisz swoje hasło" autocomplete="current-password" required />
                                <button class="profile-password-toggle" type="button" aria-label="Pokaż hasło">
                                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.7 4.7-6.2 7-10 7s-7.3-2.3-10-7c2.7-4.7 6.2-7 10-7s7.3 2.3 10 7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="profile-row">
                            <div class="auth-field">
                                <label class="auth-label" for="new-password">Nowe hasło</label>
                                <div class="profile-password">
                                    <input class="auth-input" type="password" id="new-password" name="newPassword"
                                        placeholder="Minimum 8 znaków" autocomplete="new-password" minlength="8"
                                        required />
                                    <button class="profile-password-toggle" type="button" aria-label="Pokaż hasło">
                                        <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="2" />
                                            <path
                                                d="M22 12c-2.7 4.7-6.2 7-10 7s-7.3-2.3-10-7c2.7-4.7 6.2-7 10-7s7.3 2.3 10 7z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="profile-strength" aria-hidden="true">
                                    <span class="profile-strength-bar"></span>
                                    <span class="profile-strength-bar"></span>
                                    <span class="profile-strength-bar"></span>
                                    <span class="profile-strength-bar"></span>
                                </div>
                            </div>



                            <div class="auth-field">
                                <label class="auth-label" for="passwordRepeat">Powtórz nowe hasło</label>
                                <div class="profile-password">
                                    <input class="auth-input" type="password" id="passwordRepeat" name="passwordRepeat"
                                        placeholder="Wpisz hasło ponownie" autocomplete="new-password" minlength="8"
                                        required />
                                    <button class="profile-password-toggle" type="button" aria-label="Pokaż hasło">
                                        <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="2" />
                                            <path
                                                d="M22 12c-2.7 4.7-6.2 7-10 7s-7.3-2.3-10-7c2.7-4.7 6.2-7 10-7s7.3 2.3 10 7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button class="auth-button" type="submit">Zapisz zmiany</button>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</main>