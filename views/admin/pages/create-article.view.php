    <main class="main">
        <section class="new-article">
            <div class="container">
                <div class="new-article-wrapper">
                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/index']); ?>"
                        class="new-article-back">Cofnij</a>
                    <form class="new-article-form" action="POST" action="#">
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
                            <button class="new-article-button">Dodaj artykuł</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>