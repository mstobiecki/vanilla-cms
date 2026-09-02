<!doctype html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/components/header.css" />
    <link rel="stylesheet" href="./css//components/hero.css" />
    <link rel="stylesheet" href="./css/components/why-vanilla.css" />
    <link rel="stylesheet" href="./css/components/statistics.css" />
    <link rel="stylesheet" href="./css/components/articles.css" />
    <link rel="stylesheet" href="./css/components/single-article.css" />
    <link rel="stylesheet" href="./css/components/technologies.css" />
    <link rel="stylesheet" href="./css/components/ready.css" />
    <link rel="stylesheet" href="./css/components/footer.css" />
    <link rel="stylesheet" href="./css//components/helpers.css" />
    <title>Vanilla CMS</title>
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <p>Vanilla CMS</p>
        </div>
        <nav class="header-navigation">
            <div class="header-navigation-wrapper">
                <ul class="header-navigation-list">
                    <li class="header-navigation-item">
                        <a href="#" class="header-navigation-link">Strona główna</a>
                    </li>
                    <li class="header-navigation-item">
                        <a href="#" class="header-navigation-link">O blogu</a>
                    </li>
                    <li class="header-navigation-item">
                        <a href="#" class="header-navigation-link">Kontakt</a>
                    </li>
                </ul>
            </div>
            <button class="header-navigation-button header-navigation-hamburger">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-menu-2 header-hamburger-navigation" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </button>
            <button class="header-navigation-button header-navigation-close-button">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </nav>
    </header>
    <?php echo $contents; ?>
    <footer class="footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-first-row">
                    <h4 class="footer-heading">Vanilla CMS</h4>
                    <p class="footer-paragraph">
                        Prosty system zarządzania treścią stworzony od podstaw w PHP,
                        JavaScript i CSS.
                    </p>
                    <div class="ready-icons">
                        <a class="ready-icon-link" href="https://github.com/mstobiecki/vanilla-cms">
                            <i class="ready-icon fa-brands fa-github"></i>
                        </a>
                        <a class="ready-icon-link" href="#">
                            <i class="ready-icon fa-brands fa-facebook"></i>
                        </a>
                        <a class="ready-icon-link" href="#">
                            <i class="ready-icon fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-second-row">
                    <h4 class="footer-heading">Nawigacja</h4>
                    <nav class="footer-navigation">
                        <ul class="footer-navigation-list">
                            <li class="footer-navigation-item">
                                <a class="footer-navigation-link" href="#">Strona główna</a>
                            </li>
                            <li class="footer-navigation-item">
                                <a class="footer-navigation-link" href="#">O blogu</a>
                            </li>
                            <li class="footer-navigation-item">
                                <a class="footer-navigation-link" href="#">Artykuły</a>
                            </li>
                            <li class="footer-navigation-item">
                                <a class="footer-navigation-link" href="#">Kontakt</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="footer-third-row">
                    <h4 class="footer-heading">Kontakt</h4>
                    <a href="mailto:kontakt@vanillacms.pl" class="footer-email">kontakt@vanillacms.pl</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="footer-copyright">
                    2026 &copy; Vanilla CMS. Wszelkie prawa zastrzeżone.
                </p>
                <p class="footer-made">
                    Stworzone z pasją w Vanilla PHP, JS oraz CSS.
                    <i class="footer-bottom-icon fa-solid fa-heart"></i>
                </p>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/2b2f2d7c3e.js" crossorigin="anonymous"></script>
    <script type="module" src="./src/js/index.js"></script>
</body>

</html>