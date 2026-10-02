    <main class="main">
        <section class="article">
            <div class="container">
                <div class="article-wrapper">
                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/index']); ?>"
                        class="article-back">Cofnij</a>
                    <form class="article-form" enctype="multipart/form-data" method="POST"
                        action="index.php?<?php echo http_build_query(['route' => 'admin/articles/create']); ?>">
                        <div class="article-form-container">
                            <label class="article-title" for="title">Tytuł</label>
                            <input class="article-input" type="text" id="title" name="title"
                                placeholder="Wpisz tytuł artykułu" />
                        </div>
                        <div class="article-form-container">
                            <label class="article-title" for="content">Treść</label>
                            <textarea class="article-input article-textarea" name="content" id="content"
                                placeholder="Wpisz treść artykułu"></textarea>
                        </div>
                        <div class="article-form-container">
                            <label class="article-title" for="content">Czas czytania</label>
                            <input class="article-input" type="number" name="readingTime" id="redingTime"
                                placeholder="Podaj w minutach średni czas czytania artykułu" />
                        </div>
                        <div class="article-form-container">
                            <label class="article-title" for="image">Grafika do artykułu</label>
                            <input class="article-input" type="file" name="image" id="image"
                                accept="image/jpeg,image/png,image/webp" />
                        </div>
                        <div class="article-form-container">
                            <button class="article-button">Dodaj artykuł</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>