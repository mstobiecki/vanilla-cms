<main class="main">
    <div class="container">
        <section class="auth">
            <div class="auth-card">
                <header class="auth-header">
                    <span class="auth-tag">Witaj ponownie</span>
                    <h2 class="auth-heading">
                        Zaloguj <span class="auth-heading-special">się</span>
                    </h2>
                    <p class="auth-paragraph">
                        Podaj swój adres e-mail i hasło, aby przejść do konta.
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
                    action="index.php?<?php echo http_build_query(['route' => 'account/login']); ?>">
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
                            placeholder="Wpisz swoje hasło" autocomplete="current-password" required />
                    </div>

                    <button class="auth-button" type="submit">Zaloguj się</button>
                </form>

                <p class="auth-switch">
                    Nie masz jeszcze konta?
                    <a class="auth-switch-link"
                        href="index.php?<?php echo http_build_query(['route' => 'account/register']); ?>">Zarejestruj
                        się</a>
                </p>
            </div>
        </section>
    </div>
</main>