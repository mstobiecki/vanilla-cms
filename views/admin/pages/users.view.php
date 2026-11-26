<main class="main">
    <div class="container">
        <div class="users">
            <div class="users-stack">

                <!-- KOMUNIKATY FLASH (powtarzane dla każdego komunikatu; wersja błędu poniżej)
                <p class="users-flash users-flash-success" role="status">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    Dane użytkownika zostały zapisane.
                </p>
                <p class="users-flash users-flash-error" role="alert">
                    <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                    Nie możesz usunąć własnego konta.
                </p>
                -->
                <ul class="users-stats">
                    <li class="users-stat">
                        <div class="users-stat-icon icon-user">
                            <i class="fa-solid fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="users-stat-text">
                            <span class="users-stat-number">28</span>
                            <span class="users-stat-label">Wszyscy użytkownicy</span>
                        </div>
                    </li>
                    <li class="users-stat">
                        <div class="users-stat-icon icon-articles">
                            <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
                        </div>
                        <div class="users-stat-text">
                            <span class="users-stat-number">2</span>
                            <span class="users-stat-label">Administratorzy</span>
                        </div>
                    </li>
                    <li class="users-stat">
                        <div class="users-stat-icon icon-comments">
                            <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <div class="users-stat-text">
                            <span class="users-stat-number">5</span>
                            <span class="users-stat-label">Nowi w tym miesiącu</span>
                        </div>
                    </li>
                    <li class="users-stat">
                        <div class="users-stat-icon icon-pen">
                            <i class="fa-solid fa-user-slash" aria-hidden="true"></i>
                        </div>
                        <div class="users-stat-text">
                            <span class="users-stat-number">1</span>
                            <span class="users-stat-label">Zablokowani</span>
                        </div>
                    </li>
                </ul>
                <section class="users-card" aria-labelledby="users-heading">
                    <header class="users-card-header">
                        <div class="users-card-content">
                            <h2 class="users-card-heading" id="users-heading">Konta użytkowników</h2>
                            <p class="users-card-description">Zarządzaj użytkownikami zapisanymi w swojej bazie danych
                            </p>
                        </div>
                        <a class="users-button users-button-primary" href="index.php?route=admin/users/create">
                            <i class="fa-solid fa-plus" aria-hidden="true"></i>
                            Dodaj użytkownika
                        </a>
                    </header>
                    <form class="users-toolbar" method="GET" action="index.php" role="search" data-users-filters>
                        <input type="hidden" name="route" value="admin/users/list" />

                        <div class="users-search">
                            <i class="users-search-icon fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <input class="users-input users-input-search" type="search" name="q"
                                aria-label="Szukaj użytkownika" placeholder="Szukaj po nazwie lub adresie e-mail"
                                value="" />
                        </div>

                        <select class="users-input users-select" name="role" aria-label="Filtruj według roli">
                            <option value="">Rola: wszystkie</option>
                            <option value="admin">Administrator</option>
                            <option value="user">Użytkownik</option>
                        </select>

                        <select class="users-input users-select" name="status" aria-label="Filtruj według statusu">
                            <option value="">Status: wszystkie</option>
                            <option value="active">Aktywny</option>
                            <option value="blocked">Zablokowany</option>
                        </select>

                        <button class="users-visually-hidden" type="submit">Szukaj</button>
                        <a class="users-clear-filters" href="index.php?route=admin/users/list">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            Wyczyść filtry
                        </a>
                    </form>

                    <!-- 
                    <p class="users-empty">Nie znaleziono użytkowników spełniających podane kryteria.</p>
                    -->

                    <div class="users-table-wrapper">
                        <table class="users-table" aria-label="Lista użytkowników">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Użytkownik</th>
                                    <th scope="col">Rola</th>
                                    <th scope="col">Komentarze</th>
                                    <th scope="col">Zarejestrowano</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Akcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="users-row">
                                    <td class="users-cell users-cell-id">1</td>
                                    <td class="users-cell">
                                        <div class="users-user">
                                            <div class="users-avatar users-avatar-2" aria-hidden="true">A</div>
                                            <div class="users-user-text">
                                                <span class="users-name">
                                                    admin
                                                    <span class="users-self-tag">To Ty</span>
                                                </span>
                                                <span class="users-email">admin@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-admin">
                                            <i class="fa-solid fa-shield-halved" aria-hidden="true"></i> Administrator
                                        </span>
                                    </td>
                                    <td class="users-cell users-cell-number">14</td>
                                    <td class="users-cell users-cell-date">12.03.2026</td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-active">
                                            <span class="users-badge-dot" aria-hidden="true"></span> Aktywny
                                        </span>
                                    </td>
                                    <td class="users-cell">
                                        <div class="users-actions">
                                            <button class="users-action users-action-edit" type="button" data-edit-user
                                                aria-haspopup="dialog" aria-label="Edytuj użytkownika admin" data-id="1"
                                                data-username="admin" data-email="admin@example.com" data-role="admin"
                                                data-status="active" data-self="1">
                                                Edytuj
                                            </button>

                                            <form method="POST" action="index.php?route=admin/users/delete">
                                                <input type="hidden" name="id" value="1" />
                                                <button class="users-action users-action-delete" type="submit"
                                                    aria-label="Usuń użytkownika admin" disabled
                                                    title="Nie możesz usunąć własnego konta">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="users-row">
                                    <td class="users-cell users-cell-id">2</td>
                                    <td class="users-cell">
                                        <div class="users-user">
                                            <div class="users-avatar users-avatar-3" aria-hidden="true">A</div>
                                            <div class="users-user-text">
                                                <span class="users-name">anna.kowalska</span>
                                                <span class="users-email">anna.kowalska@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-user">Użytkownik</span>
                                    </td>
                                    <td class="users-cell users-cell-number">23</td>
                                    <td class="users-cell users-cell-date">02.04.2026</td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-active">
                                            <span class="users-badge-dot" aria-hidden="true"></span> Aktywny
                                        </span>
                                    </td>
                                    <td class="users-cell">
                                        <div class="users-actions">
                                            <button class="users-action users-action-edit" type="button" data-edit-user
                                                aria-haspopup="dialog" aria-label="Edytuj użytkownika anna.kowalska"
                                                data-id="2" data-username="anna.kowalska"
                                                data-email="anna.kowalska@example.com" data-role="user"
                                                data-status="active" data-self="0">
                                                Edytuj
                                            </button>

                                            <form method="POST" action="index.php?route=admin/users/delete">
                                                <input type="hidden" name="id" value="2" />
                                                <button class="users-action users-action-delete" type="submit"
                                                    aria-label="Usuń użytkownika anna.kowalska">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="users-row">
                                    <td class="users-cell users-cell-id">5</td>
                                    <td class="users-cell">
                                        <div class="users-user">
                                            <div class="users-avatar users-avatar-1" aria-hidden="true">P</div>
                                            <div class="users-user-text">
                                                <span class="users-name">piotr.w</span>
                                                <span class="users-email">piotr.w@example.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-user">Użytkownik</span>
                                    </td>
                                    <td class="users-cell users-cell-number">0</td>
                                    <td class="users-cell users-cell-date">21.06.2026</td>
                                    <td class="users-cell">
                                        <span class="users-badge users-badge-blocked">
                                            <span class="users-badge-dot" aria-hidden="true"></span> Zablokowany
                                        </span>
                                    </td>
                                    <td class="users-cell">
                                        <div class="users-actions">
                                            <button class="users-action users-action-edit" type="button" data-edit-user
                                                aria-haspopup="dialog" aria-label="Edytuj użytkownika piotr.w"
                                                data-id="5" data-username="piotr.w" data-email="piotr.w@example.com"
                                                data-role="user" data-status="blocked" data-self="0">
                                                Edytuj
                                            </button>

                                            <form method="POST" action="index.php?route=admin/users/delete">
                                                <input type="hidden" name="id" value="5" />
                                                <button class="users-action users-action-delete" type="submit"
                                                    aria-label="Usuń użytkownika piotr.w">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="users-pagination">
                        <p class="users-pagination-info">Wyświetlono 1–8 z 28 użytkowników</p>

                        <nav aria-label="Paginacja listy użytkowników">
                            <ul class="users-pagination-list">
                                <li>
                                    <!-- Na pierwszej stronie zamiast linku: <span class="users-page users-page-disabled" aria-hidden="true"> -->
                                    <span class="users-page users-page-disabled" aria-hidden="true">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </span>
                                </li>
                                <li>
                                    <span class="users-page users-page-active" aria-current="page">1</span>
                                </li>
                                <li>
                                    <a class="users-page" aria-label="Strona 2"
                                        href="index.php?route=admin/users/list&page=2">2</a>
                                </li>
                                <li>
                                    <a class="users-page" aria-label="Strona 3"
                                        href="index.php?route=admin/users/list&page=3">3</a>
                                </li>
                                <li>
                                    <a class="users-page" aria-label="Strona 4"
                                        href="index.php?route=admin/users/list&page=4">4</a>
                                </li>
                                <li>
                                    <a class="users-page" aria-label="Następna strona"
                                        href="index.php?route=admin/users/list&page=2">
                                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
            <dialog class="users-modal" id="edit-user-dialog" aria-labelledby="edit-user-title">
                <form class="users-modal-form" method="POST" action="index.php?route=admin/users/update">
                    <input type="hidden" name="id" id="edit-user-id" value="" />

                    <header class="users-modal-header">
                        <div class="users-modal-avatar" id="edit-user-avatar" aria-hidden="true"></div>
                        <div class="users-modal-title-wrapper">
                            <h2 class="users-modal-title" id="edit-user-title">Edytuj użytkownika</h2>
                            <p class="users-modal-subtitle">ID konta: <span id="edit-user-id-label"></span></p>
                        </div>
                        <button class="users-modal-close" type="button" data-close-dialog aria-label="Zamknij okno">
                            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                        </button>
                    </header>

                    <div class="users-modal-body">
                        <!--
                        <div class="users-modal-errors" role="alert" data-form-errors>
                            <p class="users-modal-error">
                                <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                Konto z takim adresem e-mail już istnieje.
                            </p>
                        </div>
                        -->

                        <div class="users-field">
                            <label class="users-label" for="edit-user-username">Nazwa użytkownika</label>
                            <input class="users-input" type="text" id="edit-user-username" name="username" minlength="3"
                                maxlength="50" autocomplete="off" required autofocus value="" />
                        </div>

                        <div class="users-field">
                            <label class="users-label" for="edit-user-email">Adres e-mail</label>
                            <input class="users-input" type="email" id="edit-user-email" name="email" maxlength="255"
                                autocomplete="off" required value="" />
                        </div>

                        <div class="users-modal-row">
                            <div class="users-field">
                                <label class="users-label" for="edit-user-role">Rola</label>
                                <select class="users-input users-select" id="edit-user-role" name="role">
                                    <option value="user">Użytkownik</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>

                            <div class="users-field">
                                <label class="users-label" for="edit-user-status">Status konta</label>
                                <select class="users-input users-select" id="edit-user-status" name="status">
                                    <option value="active">Aktywny</option>
                                    <option value="blocked">Zablokowany</option>
                                </select>
                            </div>
                        </div>

                        <p class="users-modal-hint" data-self-hint hidden>
                            <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                            To Twoje konto. Nie możesz zmienić własnej roli ani statusu.
                        </p>
                    </div>

                    <footer class="users-modal-footer">
                        <button class="users-button users-button-secondary" type="button"
                            data-close-dialog>Anuluj</button>
                        <button class="users-button users-button-primary" type="submit">Zapisz zmiany</button>
                    </footer>
                </form>
            </dialog>
        </div>
    </div>
</main>