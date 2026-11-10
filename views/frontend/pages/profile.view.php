<main>
    <section class="profile">
        <div class="container">
            <!-- <div class="profile-title-wrapper">
                <span class="profile-letter">M</span>
                <div class="profile-title-content">
                    <span class="profile-account">Twoje konto</span>
                    <h2 class="profile-title-heading">Mój <span class="profile-title-heading-special">profil</span></h2>
                </div>
            </div> -->
            <div class="profile-card-wrapper">
                <div class="profile-card">
                    <div class="profile-card-description">
                        <h3 class="profile-card-heading">Dane konta</h3>
                        <p class="profile-card-paragraph">Zmień nazwę użytkownika lub adres e-mail powiązany z kontem.
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
                    <div class="profile-card-description">
                        <h3 class="profile-card-heading">Zmiana hasła</h3>
                        <p class="profile-card-paragraph">Użyj minimum 8 znaków. Po zmianie hasła pozostaniesz
                            zalogowany.
                        </p>
                    </div>
                    <form class="profile-form" action="#" method="POST">
                        <div class="auth-field">
                            <label class="auth-label" for="current-password">Aktualne hasło</label>
                            <input class="auth-input" type="password" id="current-password" name="current-password"
                                placeholder="Wpisz swoje hasło" autocomplete="current-password" required />
                        </div>
                        <div class="auth-field">
                            <label class="auth-label" for="new-password">Nowe hasło</label>
                            <input class="auth-input" type="password" id="new-password" name="newPassword"
                                placeholder="Minimum 8 znaków" autocomplete="new-password" minlength="8" required />
                        </div>

                        <div class="auth-field">
                            <label class="auth-label" for="passwordRepeat">Powtórz nowe hasło</label>
                            <input class="auth-input" type="password" id="passwordRepeat" name="passwordRepeat"
                                placeholder="Wpisz hasło ponownie" autocomplete="new-password" minlength="8" required />
                        </div>
                        <button class="auth-button" type="submit">Zapisz zmiany</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>