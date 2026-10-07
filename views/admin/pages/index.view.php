    <main class="main">
        <section class="summary">
            <div class="container">
                <div class="summary-wrapper">
                    <div class="summary-text">
                        <h1 class="summary-heading">Witaj admin! 👋</h1>
                        <p class="summary-paragraph">
                            Oto podsumowanie najważniejszych informacji o Twoim blogu.
                        </p>
                    </div>
                    <div class="summary-image-wrapper">
                        <img src="./img/hero-image.jpg"
                            alt="Obraz przedstawiający komputer z monitorem, klawiaturą i myszką, a w tle ikony języków programowania"
                            class="summary-image" />
                    </div>
                </div>
            </div>
        </section>
        <section class="info">
            <div class="container">
                <ul class="info-list">
                    <li class="info-item">
                        <a class="info-item-link"
                            href="index.php?<?php echo http_build_query(['route' => 'admin/articles/list']); ?>">
                            <div class="info-icon-wrapper">
                                <i class="info-icon info-icon-sticky fa-regular fa-note-sticky"></i>
                            </div>
                            <div class="info-text-wrapper">
                                <span class="info-text-number">24</span>
                                <p class="info-text-paragraph">Artykuły</p>
                            </div>
                        </a>
                    </li>
                    <li class="info-item">
                        <div class="info-icon-wrapper">
                            <i class="info-icon info-icon-folder fa-solid fa-folder-open"></i>
                        </div>
                        <div class="info-text-wrapper">
                            <span class="info-text-number">8</span>
                            <p class="info-text-paragraph">Kategorie</p>
                        </div>
                    </li>
                    <li class="info-item">
                        <div class="info-icon-wrapper">
                            <i class="info-icon info-icon-user fa-solid fa-user"></i>
                        </div>
                        <div class="info-text-wrapper">
                            <span class="info-text-number">3</span>
                            <p class="info-text-paragraph">Autorzy</p>
                        </div>
                    </li>
                    <li class="info-item">
                        <div class="info-icon-wrapper">
                            <i class="info-icon info-icon-dots fa-regular fa-comment-dots"></i>
                        </div>
                        <div class="info-text-wrapper">
                            <span class="info-text-number">28</span>
                            <p class="info-text-paragraph">Komentarze</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="chart">
            <div class="container">
                <div class="chart-container">
                    <h3 class="chart-heading">Artykuły - przegląd </h3>
                    <div style="position: relative; height: 400px;">
                        <canvas id="articlesChart"></canvas>
                    </div>
                    <div class="statistic-chart">
                        <ul class="statistic-chart-list">
                            <li class="statistic-chart-item">
                                <span class="statistic-chart-number">24</span>
                                <p class="statistic-chart-info">Łącznie artykułów</p>
                            </li>
                            <li class="statistic-chart-item">
                                <span class="statistic-chart-number">
                                    <span class=statistic-chart-number-special>+4</span>
                                </span>
                                <p class="statistic-chart-info">W tym tygodniu</p>
                            </li>
                            <li class="statistic-chart-item">
                                <span class="statistic-chart-number">
                                    <span class=statistic-chart-number-special>+18%</span>
                                </span>
                                <p class="statistic-chart-info">Wzrost tygodniowy</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="fast-actions">
            <div class="container">
                <div class="fast-actions-wrapper">
                    <h3 class="fast-actions-heading">Szybkie akcje</h3>
                    <ul class="fast-actions-list">
                        <li class="fast-actions-item">
                            <div class="fast-actions-icon-wrapper">
                                <i class="fast-actions-icon fa-regular fa-pen-to-square"></i>
                            </div>
                            <div class="fast-actions-text-wrapper">
                                <a href="index.php?<?php echo http_build_query(['route' => 'admin/articles/create']); ?>"
                                    class="fast-actions-link">Dodaj nowy artykuł</a>
                            </div>
                        </li>
                        <li class="fast-actions-item">
                            <div class="fast-actions-icon-wrapper">
                                <i class="fast-actions-icon fa-regular fa-folder-open"></i>
                            </div>
                            <div class="fast-actions-text-wrapper">
                                <a href="#" class="fast-actions-link">Dodaj nową kategorię</a>
                            </div>
                        </li>
                        <li class="fast-actions-item">
                            <div class="fast-actions-icon-wrapper">
                                <i class="fast-actions-icon fa-regular fa-note-sticky"></i>
                            </div>
                            <div class="fast-actions-text-wrapper">
                                <a href="#" class="fast-actions-link">Dodaj nową stronę</a>
                            </div>
                        </li>
                        <li class="fast-actions-item">
                            <div class="fast-actions-icon-wrapper">
                                <i class="fast-actions-icon fa-regular fa-comment-dots"></i>
                            </div>
                            <div class="fast-actions-text-wrapper">
                                <a href="#" class="fast-actions-link">Zobacz komentarze</a>
                            </div>
                        </li>
                        <li class="fast-actions-item">
                            <div class="fast-actions-icon-wrapper">
                                <i class="fast-actions-icon fa-solid fa-gear"></i>
                            </div>
                            <div class="fast-actions-text-wrapper">
                                <a href="#" class="fast-actions-link">Przejdź do ustawień</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section>

            <?php

    $chartData = [
        [
            'date' => '2026-10-01',
            'views' => 120,
        ],
        [
            'date' => '2026-10-02',
            'views' => 180,
        ],
        [
            'date' => '2026-10-03',
            'views' => 145,
        ],
        [
            'date' => '2026-10-04',
            'views' => 230,
        ],
    ];
                            ?>


            <script>
            const chartData = <?= json_encode(
                $chartData,
                JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
            ) ?>;

            const labels = chartData.map(item => item.date);
            const views = chartData.map(item => Number(item.views));

            const ctx = document.getElementById('articlesChart');

            new Chart(ctx, {
                type: 'line',

                data: {
                    labels: labels,

                    datasets: [{
                        label: 'Wyświetlenia',
                        data: views,
                        borderColor: 'rgb(121, 80, 242)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true,
                        backgroundColor: 'rgba(121, 80, 242, 0.15)',
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
        </section>
        <section class="last-activity">
            <div class="container">
                <h3 class="last-activity-heading">Ostatnia aktywność</h3>
                <div class="last-activity-wrapper">
                    <ul class="last-activity-list">
                        <li class="last-activity-item">
                            <div class="last-activity-icon-container">
                                <i class="last-activity-icon fa-regular fa-user"></i>
                            </div>
                            <div class="last-activity-text-wrapper">
                                <h4 class="last-activity-text-heading">Dodano nowy artykuł</h4>
                                <p class="last-activity-text-info">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <time datetime="2026-10-07T1:30" class="last-activity-date">
                                <span class="last-activity-date">7 października</span>
                                <span class="last-activity-time">14:30</span>
                            </time>
                        </li>
                        <li class="last-activity-item">
                            <div class="last-activity-icon-container">
                                <i class="last-activity-icon fa-regular fa-note-sticky"></i>
                            </div>
                            <div class="last-activity-text-wrapper">
                                <h4 class="last-activity-text-heading">Zaktualizowano artykuł</h4>
                                <p class="last-activity-text-info">Lorem ipsum dolor sit.</p>
                            </div>
                            <time datetime="2026-10-07T1:30" class="last-activity-date">
                                <span class="last-activity-date">7 października</span>
                                <span class="last-activity-time">15:23</span>
                            </time>
                        </li>
                        <li class="last-activity-item">
                            <div class="last-activity-icon-container">
                                <i class="last-activity-icon fa-solid fa-pen"></i>
                            </div>
                            <div class="last-activity-text-wrapper">
                                <h4 class="last-activity-text-heading">Dodano nowy artykuł</h4>
                                <p class="last-activity-text-info">Lorem ipsum dolor sit amet consectetur.</p>
                            </div>
                            <time datetime="2026-10-07T1:30" class="last-activity-date">
                                <span class="last-activity-date">7 października</span>
                                <span class="last-activity-time">14:30</span>
                            </time>
                        </li>
                        </li>
                        <li class="last-activity-item">
                            <div class="last-activity-icon-container">
                                <i class="last-activity-icon info-icon-dots fa-regular fa-comment-dots"></i>
                            </div>
                            <div class="last-activity-text-wrapper">
                                <h4 class="last-activity-text-heading">Nowy komentarz</h4>
                                <p class="last-activity-text-info">Do artykułu: Lorem ipsum dolor sit amet.</p>
                            </div>
                            <time datetime="2026-10-07T1:30" class="last-activity-date">
                                <span class="last-activity-date">7 października</span>
                                <span class="last-activity-time">17:15</span>
                            </time>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>