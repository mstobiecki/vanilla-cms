<main class="main">
    <div class="container">
        <div class="articles-card">
            <div class="articles-header">
                <?php foreach ($flash['success'] ?? [] as $message): ?>
                <p class="articles-message articles-message-success">
                    <?php echo espaceHtml($message); ?>
                </p>
                <?php endforeach; ?>

                <?php foreach ($flash['error'] ?? [] as $message): ?>
                <p class="articles-message articles-message-error">
                    <?php echo espaceHtml($message); ?>
                </p>
                <?php endforeach; ?>
                <div>
                    <h2>Artykuły</h2>
                    <p>Zarządzaj artykułami w swojej bazie danych</p>
                </div>
            </div>
            <div class="table-wrapper">
                <table class="articles-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allArticlesFromDb as $singleArticle): ?>
                        <tr>
                            <td class="article-id">
                                <?php echo espaceHtml($singleArticle->id); ?>
                            </td>
                            <td class="article-title">
                                <?php echo espaceHtml($singleArticle->title); ?>
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/articles/edit', 'id' => $singleArticle->id]); ?>"
                                        class="btn btn-edit">Edytuj</a>
                                    <form method="POST"
                                        action="index.php?<?php echo http_build_query(['route' => 'admin/articles/delete']); ?>">
                                        <input type="hidden" name="id"
                                            value="<?php echo espaceHtml($singleArticle->id); ?>" />
                                        <button class="btn btn-delete">
                                            Usuń
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>