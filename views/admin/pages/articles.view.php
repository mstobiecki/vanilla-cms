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
                        <tr>
                            <td class="article-id">1</td>
                            <td class="article-title">
                                Jak stworzyć własną stronę internetową?
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="/articles/edit/1" class="btn btn-edit">Edytuj</a>
                                    <button class="btn btn-delete" onclick="deleteArticle(1)">
                                        Usuń
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="article-id">2</td>
                            <td class="article-title">
                                10 wskazówek dotyczących CSS
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="/articles/edit/2" class="btn btn-edit">Edytuj</a>
                                    <button class="btn btn-delete" onclick="deleteArticle(2)">
                                        Usuń
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="article-id">3</td>
                            <td class="article-title">
                                Nowości w świecie technologii
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="/articles/edit/3" class="btn btn-edit">Edytuj</a>
                                    <button class="btn btn-delete" onclick="deleteArticle(3)">
                                        Usuń
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>