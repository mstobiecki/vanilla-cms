<main>
    <div class="container">
        <div class="articles-card">
            <div class="articles-header">
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
                                    <a href="index.php?<?php echo http_build_query(['route' => 'admin/articles/', 'edit' => $singleArticle->id]); ?>"
                                        class="btn btn-edit">Edytuj</a>
                                    <button class="btn btn-delete" onclick="deleteArticle(1)">
                                        Usuń
                                    </button>
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