<main class="main">
    <div class="container">
        <section class="auth">
            <div class="auth-card">
                <header class="auth-header">
                    <span class="auth-tag">Dołącz do nas</span>
                    <h2 class="auth-heading">
                        Załóż <span class="auth-heading-special">konto</span>
                    </h2>
                    <p class="auth-paragraph">
                        Utwórz darmowe konto w Vanilla CMS i zacznij korzystać z serwisu.
                    </p>
                </header>

                <?php if (!empty($errors)): ?>
                <div class="auth-errors" role="alert">
                    <?php foreach ($errors as $error): ?>
                    <p class="auth-error">
                        <i class="auth-error-icon fa-solid fa-circle-exclamation"></i>
                        <?php echo espaceHtml($error); ?>
                    </p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form class="auth-form" method="POST" novalidate
                    action="index.php?<?php echo http_build_query(['route' => 'account/register']); ?>">
                    <?php echo csrfField(); ?>
                    <div class="auth-field">
                        <label class="auth-label" for="email">Adres e-mail</label>
                        <input class="auth-input" type="email" id="email" name="email"
                            placeholder="jan.kowalski@example.com" autocomplete="email" required
                            value="<?php echo espaceHtml($email ?? ''); ?>" />
                    </div>

                    <div class="auth-field">
                        <label class="auth-label" for="password">Hasło</label>
                        <input class="auth-input" type="password" id="password" name="password"
                            placeholder="Minimum 8 znaków" autocomplete="new-password" minlength="8" required />
                    </div>

                    <div class="auth-field">
                        <label class="auth-label" for="passwordRepeat">Powtórz hasło</label>
                        <input class="auth-input" type="password" id="passwordRepeat" name="passwordRepeat"
                            placeholder="Wpisz hasło ponownie" autocomplete="new-password" minlength="8" required />
                    </div>

                    <button class="auth-button" type="submit">Utwórz konto</button>
                </form>

                <p class="auth-switch">
                    Masz już konto?
                    <a class="auth-switch-link"
                        href="index.php?<?php echo http_build_query(['route' => 'account/login']); ?>">Zaloguj się</a>
                </p>
            </div>
        </section>
    </div>
</main>