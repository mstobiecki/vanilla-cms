  <main class="main">
      <div class="container">
          <section class="single-article-wrapper">
              <article class="single-article">
                  <header class="single-article-header">
                      <h2 class="single-article-heading">
                          <?php echo espaceHtml($singleArticle->title); ?>
                      </h2>
                      <div class="single-article-info">
                          <p class="single-article-addons">
                              <span class="single-article-icon-wrapper">
                                  <i class="single-article-icon fa-regular fa-calendar"></i>
                              </span>
                              <time datetime="2026-08-25"><?php echo espaceHtml($singleArticle->createAt); ?></time>
                          </p>
                          <p class="single-article-addons">
                              <span class="single-article-icon-wrapper">
                                  <i class="single-article-icon fa-solid fa-user"></i>
                              </span>
                              <?php echo espaceHtml($singleArticle->author); ?>
                          </p>
                          <p class="single-article-addons">
                              <span class="single-article-icon-wrapper">
                                  <i class="single-article-icon fa-regular fa-clock"></i>
                              </span>
                              <?php echo espaceHtml($singleArticle->readingTime); ?> min czytania
                          </p>
                      </div>
                  </header>
                  <div class="single-article-container">
                      <div class="single-article-image-wrapper">
                          <img class="single-article-image" src="./<?php echo espaceHtml($singleArticle->image); ?>"
                              alt="Obraz przedstawiający komputer z monitorem, klawiaturą i myszką, a w tle ikony języków programowania" />
                      </div>
                      <div class="single-article-text">
                          <p class="single-article-paragraph">
                              <?php echo espaceHtml($singleArticle->content); ?>
                          </p>
                      </div>
                  </div>
                  <footer class="single-article-footer">
                      <p class="single-article-footer-share">Udostępnij:</p>
                      <a class="single-article-footer-link" href="#">
                          <i class="single-article-icon fa-brands fa-facebook"></i>
                      </a>
                      <a class="single-article-footer-link" href="#">
                          <i class="single-article-icon fa-brands fa-x-twitter"></i>
                      </a>
                      <a class="single-article-footer-link" href="#">
                          <i class="single-article-icon fa-brands fa-linkedin"></i>
                      </a>
                  </footer>
              </article>
              <section class="comments" id="comments">
                  <header class="comments-header">
                      <h3 class="comments-heading">
                          Komentarze
                          <span class="comments-count">3</span>
                      </h3>
                  </header>
                  <div class="comments-errors" role="alert">
                      <p class="comments-error">
                          <i class="comments-error-icon fa-solid fa-circle-exclamation"></i>
                          Komentarz nie może być pusty.
                      </p>
                  </div>
                  <form class="comments-form" method="POST" action="#comments" novalidate>
                      <label class="comments-label" for="comment-content">Dodaj komentarz</label>
                      <textarea class="comments-textarea" id="comment-content" name="content" rows="4" maxlength="1000"
                          placeholder="Napisz, co myślisz o tym artykule..." required></textarea>
                      <div class="comments-form-footer">
                          <p class="comments-hint">Maksymalnie 1000 znaków.</p>
                          <button class="comments-button" type="submit">Opublikuj komentarz</button>
                      </div>
                  </form>
                  <div class="comments-login-box">
                      <p class="comments-login-text">
                          <i class="comments-login-icon fa-regular fa-comment-dots"></i>
                          Aby dodać komentarz, musisz być zalogowany.
                      </p>
                      <div class="comments-login-actions">
                          <a class="comments-button" href="#">Zaloguj się</a>
                          <a class="comments-button comments-button-outline" href="#">Załóż konto</a>
                      </div>
                  </div>
                  <ul class="comments-list">
                      <li class="comments-item">
                          <div class="comments-avatar" aria-hidden="true">J</div>
                          <div class="comments-body">
                              <div class="comments-meta">
                                  <span class="comments-author">mateusz</span>
                                  <time class="comments-date" datetime="2026-11-02">2 listopada 2026, 17:21</time>
                              </div>
                              <p class="comments-text">Świetny artykuł! Dokładnie tego szukałem, zwłaszcza fragment o
                                  sesjach.</p>
                              <form class="comments-delete-form" method="POST" action="#">
                                  <button class="comments-delete" type="submit">
                                      <i class="fa-regular fa-trash-can"></i> Usuń
                                  </button>
                              </form>
                          </div>
                      </li>
                      <li class="comments-item">
                          <div class="comments-avatar" aria-hidden="true">A</div>
                          <div class="comments-body">
                              <div class="comments-meta">
                                  <span class="comments-author">janek</span>
                                  <time class="comments-date" datetime="2026-11-01">1 listopada 2026, 09:05</time>
                              </div>
                              <p class="comments-text">Czy planujesz podobny wpis o zabezpieczaniu formularzy tokenem
                                  CSRF? Chętnie bym przeczytała.</p>
                          </div>
                      </li>
                  </ul>
                  <p class="comments-empty">Nie ma jeszcze żadnych komentarzy. Bądź pierwszy!</p>
              </section>
          </section>
      </div>
  </main>