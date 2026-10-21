<main class="main">
    <div class="container">
        <section class="register">
            <div class="register-card">
                <header class="register-header">
                    <span class="register-tag">Dołącz do nas</span>
                    <h2 class="register-heading">
                        Załóż <span class="register-heading-special">konto</span>
                    </h2>
                    <p class="register-paragraph">
                        Utwórz darmowe konto w Vanilla CMS i zacznij korzystać z serwisu.
                    </p>
                </header>

                <?php if (!empty($errors)): ?>
                <div class="register-errors" role="alert">
                    <?php foreach ($errors as $error): ?>
                    <p class="register-error">
                        <i class="register-error-icon fa-solid fa-circle-exclamation"></i>
                        <?php echo espaceHtml($error); ?>
                    </p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form class="register-form" method="POST" novalidate
                    action="index.php?<?php echo http_build_query(['route' => 'account/register']); ?>">
                    <div class="register-field">
                        <label class="register-label" for="email">Adres e-mail</label>
                        <input class="register-input" type="email" id="email" name="email"
                            placeholder="jan.kowalski@example.com" autocomplete="email" required
                            value="<?php echo espaceHtml($email ?? ''); ?>" />
                    </div>

                    <div class="register-field">
                        <label class="register-label" for="password">Hasło</label>
                        <input class="register-input" type="password" id="password" name="password"
                            placeholder="Minimum 8 znaków" autocomplete="new-password" minlength="8" required />
                    </div>

                    <div class="register-field">
                        <label class="register-label" for="passwordRepeat">Powtórz hasło</label>
                        <input class="register-input" type="password" id="passwordRepeat" name="passwordRepeat"
                            placeholder="Wpisz hasło ponownie" autocomplete="new-password" minlength="8" required />
                    </div>

                    <button class="register-button" type="submit">Utwórz konto</button>
                </form>

                <p class="register-login">
                    Masz już konto?
                    <a class="register-login-link"
                        href="index.php?<?php echo http_build_query(['route' => 'login']); ?>">Zaloguj się</a>
                </p>
            </div>
        </section>
    </div>
</main>