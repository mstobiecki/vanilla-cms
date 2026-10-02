<?php

$titleFromDb = !empty($_POST['title']) ? espaceHtml($_POST['title']) : espaceHtml($singleArticle->title);
$contentFromDb = !empty($_POST['content']) ? espaceHtml($_POST['content']) : espaceHtml($singleArticle->content);
$readingTimeFromDb = !empty($_POST['readingTime']) ? espaceHtml($_POST['readingTime']) : espaceHtml($singleArticle->readingTime);

?>

<main class="main">
    <section class="article">
        <div class="container">
            <div class="article-wrapper">
                <a href="index.php?<?php echo http_build_query(['route' => 'admin/articles/list']); ?>"
                    class="article-back">Cofnij</a>
                <form class="article-form" enctype="multipart/form-data" method="POST"
                    action="index.php?<?php echo http_build_query(['route' => 'admin/articles/edit', 'id' => $singleArticle->id]); ?>">
                    <div class="article-form-container">
                        <label class="article-title" for="title">Tytuł</label>
                        <input class="article-input" type="text" id="title" name="title"
                            value="<?php echo $titleFromDb; ?>" placeholder="Wpisz tytuł artykułu" />
                    </div>
                    <div class="article-form-container">
                        <label class="article-title" for="content">Treść</label>
                        <textarea class="article-input article-textarea" name="content" id="content"
                            placeholder="Wpisz treść artykułu"><?php echo $contentFromDb; ?></textarea>
                    </div>
                    <div class="article-form-container">
                        <label class="article-title" for="content">Czas czytania</label>
                        <input class="article-input" type="number" name="readingTime" id="readingTime"
                            placeholder="Podaj w minutach średni czas czytania artykułu"
                            value="<?php echo $readingTimeFromDb; ?>" />
                    </div>
                    <div class="article-form-container">
                        <label class="article-title" for="image">Grafika do artykułu</label>
                        <input class="article-input" type="file" name="image" id="image"
                            accept="image/jpeg,image/png,image/webp" />
                    </div>
                    <div class="article-form-container">
                        <button class="article-button">Edytuj artykuł</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>