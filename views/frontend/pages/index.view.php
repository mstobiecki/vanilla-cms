<main class="hero">
    <div class="container">
        <div class="hero-wrapper">
            <div class="hero-text">
                <span class="hero-tag">Prosty, lekki, szybki.</span>
                <h1 class="hero-heading">
                    Vanilla CMS - prosty
                    <span class="hero-heading-special">system zarządzania treścią</span>
                </h1>
                <p class="hero-paragraph">
                    Lekki i elastyczny system CMS stworzony od podstaw w PHP,
                    JavaScript i CSS, zapewniający prostą obsługę treści oraz pełną
                    kontrolę nad stroną.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="hero-button hero-button-full">Dowiedz się więcej</a>
                    <a href="#" class="hero-button hero-button-outline">Zobacz artykuły</a>
                </div>
            </div>
            <div class="hero-image-container">
                <img class="hero-image" src="./img/hero-image.jpg"
                    alt="Obraz przedstawiający komputer z monitorem, klawiaturą i myszką, a w tle ikony języków programowania" />
            </div>
        </div>
    </div>
    <section class="why-vanilla">
        <div class="container">
            <h2 class="why-vanilla-heading">Dlaczego Vanilla CMS?</h2>
            <ul class="why-vanilla-list">
                <li class="why-vanilla-item">
                    <div class="why-vanilla-icon-wrapper">
                        <i class="why-vanilla-icon fa-solid fa-bolt"></i>
                    </div>
                    <div class="why-vanilla-text">
                        <h3 class="">Lekki i szybki</h3>
                        <p class="why-vanilla-paragraph">
                            Minimalne wymagania i szybka wydajność.
                        </p>
                    </div>
                </li>
                <li class="why-vanilla-item">
                    <div class="why-vanilla-icon-wrapper">
                        <i class="why-vanilla-icon fa-solid fa-pen"></i>
                    </div>
                    <div class="why-vanilla-text">
                        <h3 class="">Prosty w obsłudze</h3>
                        <p class="why-vanilla-paragraph">
                            Intuicyjny panel administracyjny i łatwe zarządzanie treścią.
                        </p>
                    </div>
                </li>
                <li class="why-vanilla-item">
                    <div class="why-vanilla-icon-wrapper">
                        <i class="why-vanilla-icon fa-solid fa-shield"></i>
                    </div>
                    <div class="why-vanilla-text">
                        <h3 class="">Bezpieczny</h3>
                        <p class="why-vanilla-paragraph">
                            Dbamy o bezpieczeństwo Twoich danych i treści na każdym
                            etapie.
                        </p>
                    </div>
                </li>
                <li class="why-vanilla-item">
                    <div class="why-vanilla-icon-wrapper">
                        <i class="why-vanilla-icon fa-solid fa-gear"></i>
                    </div>
                    <div class="why-vanilla-text">
                        <h3 class="">Elastyczny</h3>
                        <p class="why-vanilla-paragraph">
                            Możliwość dostosowania systemu do swoich potrzeb.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="statistics">
        <div class="container">
            <ul class="statistics-list">
                <li class="statistics-item">
                    <div class="statistics-icon-wrapper">
                        <i class="statistics-icon fa-solid fa-pen-to-square"></i>
                    </div>
                    <div class="statistics-text">
                        <span class="statistics-number">24</span>
                        <p class="statistics-category">Artykuły</p>
                    </div>
                </li>
                <li class="statistics-item">
                    <div class="statistics-icon-wrapper">
                        <i class="statistics-icon fa-solid fa-folder-open"></i>
                    </div>
                    <div class="statistics-text">
                        <span class="statistics-number">8</span>
                        <p class="statistics-category">Kategorie</p>
                    </div>
                </li>
                <li class="statistics-item">
                    <div class="statistics-icon-wrapper">
                        <i class="statistics-icon fa-solid fa-user"></i>
                    </div>
                    <div class="statistics-text">
                        <span class="statistics-number">10</span>
                        <p class="statistics-category">Użytkowników</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="articles">
        <div class="container">
            <p class="articles-subtitle">Ostatnio dodane:</p>
            <?php if ($isEmptyArticles): ?>
            <p>Brak nowych artykułów.</p>
            <?php else: ?>
            <div class="articles-wrapper">
                <article class="articles-post">
                    <div class="articles-content">
                        <div class="articles-text">
                            <h2 class="articles-heading">Lorem ipsum dolor sit amet.</h2>
                            <p class="articles-paragraph">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Sequi laboriosam dolorum dolor distinctio exercitationem,
                                odio ut quis quasi nemo facere aut dicta perspiciatis sed
                                asperiores velit commodi aliquid labore! Esse?
                            </p>
                            <div class="articles-meta">
                                <p class="articles-date">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-regular fa-calendar"></i>
                                    </span>
                                    <time datetime="2026-08-25">25 sierpnia 2026</time>
                                </p>
                                <p class="articles-author">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-solid fa-user"></i>
                                    </span>
                                    admin
                                </p>
                            </div>
                        </div>
                        <img class="articles-image" src="./img/articles-image.jpg"
                            alt="Monitor komputera z kodem, a w tle ikony języków programowania" />
                    </div>
                </article>
                <article class="articles-post">
                    <div class="articles-content">
                        <div class="articles-text">
                            <h2 class="articles-heading">Lorem ipsum dolor sit amet.</h2>
                            <p class="articles-paragraph">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Sequi laboriosam dolorum dolor distinctio exercitationem,
                                odio ut quis quasi nemo facere aut dicta perspiciatis sed
                                asperiores velit commodi aliquid labore! Esse?
                            </p>
                            <div class="articles-meta">
                                <p class="articles-date">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-regular fa-calendar"></i>
                                    </span>
                                    <time datetime="2026-08-25">25 sierpnia 2026</time>
                                </p>
                                <p class="articles-author">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-solid fa-user"></i>
                                    </span>
                                    admin
                                </p>
                            </div>
                        </div>
                        <img class="articles-image" src="./img/articles-image.jpg"
                            alt="Monitor komputera z kodem, a w tle ikony języków programowania" />
                    </div>
                </article>
                <article class="articles-post">
                    <div class="articles-content">
                        <div class="articles-text">
                            <h2 class="articles-heading">Lorem ipsum dolor sit amet.</h2>
                            <p class="articles-paragraph">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Sequi laboriosam dolorum dolor distinctio exercitationem,
                                odio ut quis quasi nemo facere aut dicta perspiciatis sed
                                asperiores velit commodi aliquid labore! Esse?
                            </p>
                            <div class="articles-meta">
                                <p class="articles-date">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-regular fa-calendar"></i>
                                    </span>
                                    <time datetime="2026-08-25">25 sierpnia 2026</time>
                                </p>
                                <p class="articles-author">
                                    <span class="articles-icon-wrapper">
                                        <i class="articles-icon fa-solid fa-user"></i>
                                    </span>
                                    admin
                                </p>
                            </div>
                        </div>
                        <img class="articles-image" src="./img/articles-image.jpg"
                            alt="Monitor komputera z kodem, a w tle ikony języków programowania" />
                    </div>
                </article>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="technologies">
        <div class="container">
            <h2 class="technologies-heading">Technologie</h2>
            <ul class="technologies-list">
                <li class="technologies-item">
                    <div class="technologies-image-wrapper">
                        <img class="technologies-image" src="./img/php-logo.png" alt="Logo języka programowania PHP" />
                    </div>
                    <div class="technologies-text">
                        <h3 class="technologies-heading-text">PHP</h3>
                        <p class="technologies-paragraph">
                            Stabliny backend napisany w czystym PHP.
                        </p>
                    </div>
                </li>
                <li class="technologies-item">
                    <div class="technologies-image-wrapper">
                        <img class="technologies-image" src="./img/js-logo.png"
                            alt="Logo języka programowania JavaScript" />
                    </div>
                    <div class="technologies-text">
                        <h3 class="technologies-heading-text">JavaScript</h3>
                        <p class="technologies-paragraph">
                            Interaktywność i dynamiczna funkcjonalność.
                        </p>
                    </div>
                </li>
                <li class="technologies-item">
                    <div class="technologies-image-wrapper">
                        <img class="technologies-image" src="./img/css-logo.png" alt="Logo arkuszy stylów CSS" />
                    </div>
                    <div class="technologies-text">
                        <h3 class="technologies-heading-text">CSS3</h3>
                        <p class="technologies-paragraph">
                            Responsywny design i nowoczesne style.
                        </p>
                    </div>
                </li>
                <li class="technologies-item">
                    <div class="technologies-image-wrapper">
                        <img class="technologies-image" src="./img/mysql-logo.png" alt="Logo bazy danych MySQL" />
                    </div>
                    <div class="technologies-text">
                        <h3 class="technologies-heading-text">MariaDB</h3>
                        <p class="technologies-paragraph">
                            Niezawodna baza danych do przechowywania treści.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="ready">
        <div class="container">
            <div class="ready-wrapper">
                <div class="ready-text">
                    <h3 class="ready-heading">Gotowy, aby zacząć?</h3>
                    <p class="ready-paragraph">
                        Vanilla CMS to idealne rozwiązanie dla każdego, kto chce mieć
                        pełną kontrolą nad swoją stroną.
                    </p>
                </div>
                <div class="ready-button-wrapper">
                    <a href="#" class="ready-button">
                        Zacznij korzystać &rightarrow;
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>