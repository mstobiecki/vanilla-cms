    <main class="main">
        <section class="new-article">
            <div class="container">
                <div class="new-article-wrapper">
                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/index']); ?>"
                        class="new-article-back">Cofnij</a>
                    <form class="new-article-form" enctype="multipart/form-data" method="POST"
                        action="index.php?<?php echo http_build_query(['route' => 'admin/pages/create']); ?>">
                        <div class="new-article-form-container">
                            <label class="new-article-title" for="title">Tytuł</label>
                            <input class="new-article-input" type="text" id="title" name="title"
                                placeholder="Wpisz tytuł artykułu" />
                        </div>
                        <div class="new-article-form-container">
                            <label class="new-article-title" for="content">Treść</label>
                            <textarea class="new-article-input new-article-textarea" name="content" id="content"
                                placeholder="Wpisz treść artykułu"></textarea>
                        </div>
                        <div class="new-article-form-container">
                            <label class="new-article-title" for="content">Czas czytania</label>
                            <input class="new-article-input" type="number" name="readingTime" id="redingTime"
                                placeholder="Podaj w minutach średni czas czytania artykułu" />
                        </div>
                        <div class="new-article-form-container">
                            <label class="new-article-title" for="image">Grafika do artykułu</label>
                            <input class="new-article-input" type="file" name="image" id="image"
                                accept="image/jpeg,image/png,image/webp" />
                        </div>
                        <div class="new-article-form-container">
                            <button class="new-article-button">Dodaj artykuł</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>