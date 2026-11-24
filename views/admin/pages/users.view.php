<main class="main">
    <section class="users-page">
        <div class="container">
            <div class="users-heading">
                <div>
                    <h1 class="users-title">Użytkownicy</h1>
                    <p class="users-description">Zarządzaj kontami i uprawnieniami użytkowników.</p>
                </div>
                <a href="index.php?route=admin/users/create" class="users-add-button">
                    <i class="fa-solid fa-user-plus"></i>
                    Dodaj użytkownika
                </a>
            </div>
            <div class="users-stats">
                <div class="users-stat-card">
                    <div class="users-stat-icon users-stat-icon--purple">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="users-stat-content">
                        <span class="users-stat-value">5</span>
                        <span class="users-stat-label">Wszystkie konta</span>
                    </div>
                </div>
                <div class="users-stat-card">
                    <div class="users-stat-icon users-stat-icon--orange">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div class="users-stat-content">
                        <span class="users-stat-value">1</span>
                        <span class="users-stat-label">Administratorzy</span>
                    </div>
                </div>
                <div class="users-stat-card">
                    <div class="users-stat-icon users-stat-icon--green">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="users-stat-content">
                        <span class="users-stat-value">4</span>
                        <span class="users-stat-label">Użytkownicy</span>
                    </div>
                </div>
            </div>
            <div class="users-panel">
                <div class="users-panel-heading">
                    <h2 class="users-panel-title">Lista użytkowników</h2>
                    <p class="users-description">Przeglądaj i zarządzaj zarejestrowanymi kontami.</p>
                </div>
                <form class="users-filters" method="GET" action="index.php">
                    <input type="hidden" name="route" value="admin/users/list">
                    <div class="users-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" name="search" placeholder="Szukaj użytkownika..."
                            aria-label="Szukaj użytkownika">
                    </div>
                    <select name="role" class="users-filter-select" aria-label="Rola użytkownika">
                        <option value="">Wszystkie role</option>
                        <option value="admin">Administrator</option>
                        <option value="user">Użytkownik</option>
                    </select>
                    <button type="submit" class="users-filter-button">
                        <i class="fa-solid fa-filter"></i>
                        Filtruj
                    </button>
                </form>
                <div class="users-table-wrapper">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Użytkownik</th>
                                <th>Rola</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="users-id">#1</td>
                                <td>
                                    <div class="users-person">
                                        <div class="users-avatar users-avatar--purple">AD</div>
                                        <div class="users-person-details">
                                            <div class="users-person-name">
                                                admin
                                                <span class="users-current">(Ty)</span>
                                            </div>
                                            <span class="users-person-email">admin@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="users-role users-role--admin">Administrator</span>
                                </td>
                                <td>
                                    <div class="users-actions">
                                        <a href="index.php?route=admin/users/edit&id=1"
                                            class="users-action users-action--edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edytuj
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="users-id">#2</td>
                                <td>
                                    <div class="users-person">
                                        <div class="users-avatar users-avatar--blue">JK</div>
                                        <div class="users-person-details">
                                            <span class="users-person-name">jan_kowalski</span>
                                            <span class="users-person-email">jan@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="users-role users-role--user">Użytkownik</span>
                                </td>
                                <td>
                                    <div class="users-actions">
                                        <a href="index.php?route=admin/users/edit&id=2"
                                            class="users-action users-action--edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edytuj
                                        </a>
                                        <button type="button" class="users-action users-action--delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Usuń
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- User -->
                            <tr>
                                <td class="users-id">#3</td>
                                <td>
                                    <div class="users-person">
                                        <div class="users-avatar users-avatar--green">AN</div>
                                        <div class="users-person-details">
                                            <span class="users-person-name">anna_dev</span>
                                            <span class="users-person-email">anna@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="users-role users-role--user">Użytkownik</span>
                                </td>
                                <td>
                                    <div class="users-actions">
                                        <a href="index.php?route=admin/users/edit&id=3"
                                            class="users-action users-action--edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edytuj
                                        </a>
                                        <button type="button" class="users-action users-action--delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Usuń
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="users-id">#4</td>
                                <td>
                                    <div class="users-person">
                                        <div class="users-avatar users-avatar--orange">MP</div>
                                        <div class="users-person-details">
                                            <span class="users-person-name">michal_php</span>
                                            <span class="users-person-email">michal@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="users-role users-role--user">Użytkownik</span>
                                </td>
                                <td>
                                    <div class="users-actions">
                                        <a href="index.php?route=admin/users/edit&id=4"
                                            class="users-action users-action--edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edytuj
                                        </a>
                                        <button type="button" class="users-action users-action--delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Usuń
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="users-id">#5</td>
                                <td>
                                    <div class="users-person">
                                        <div class="users-avatar users-avatar--purple">KA</div>
                                        <div class="users-person-details">
                                            <span class="users-person-name">karolina</span>
                                            <span class="users-person-email">karolina@example.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="users-role users-role--user">Użytkownik</span>
                                </td>
                                <td>
                                    <div class="users-actions">
                                        <a href="index.php?route=admin/users/edit&id=5"
                                            class="users-action users-action--edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edytuj
                                        </a>
                                        <button type="button" class="users-action users-action--delete">
                                            <i class="fa-solid fa-trash"></i>
                                            Usuń
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="users-panel-footer">
                    <p class="users-results">Wyświetlono 5 z 5 użytkowników</p>
                    <nav class="users-pagination" aria-label="Paginacja użytkowników">
                        <button class="users-pagination-button" aria-label="Poprzednia strona" disabled>
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <a href="#" class="users-pagination-button is-active" aria-current="page">1</a>
                        <button class="users-pagination-button" aria-label="Następna strona" disabled>
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</main>