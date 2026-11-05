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
                          <span class="comments-count">
                              <?php echo count($comments); ?>
                          </span>
                      </h3>
                  </header>
                  <?php if (!empty($commentError)): ?>
                  <div class="comments-errors" role="alert">
                      <p class="comments-error">
                          <i class="comments-error-icon fa-solid fa-circle-exclamation"></i>
                          <?php echo espaceHtml($commentError); ?>
                      </p>
                  </div>
                  <?php endif; ?>
                  <?php if ($currentUser !== null): ?>
                  <form class="comments-form" method="POST" novalidate>
                      <?php echo csrfField(); ?>
                      <label class="comments-label" for="comment-content">Dodaj komentarz</label>
                      <textarea class="comments-textarea" id="comment-content" name="content" rows="4" maxlength="1000"
                          placeholder="Napisz, co myślisz o tym artykule..."
                          required><?php echo espaceHtml($oldContent ?? ''); ?></textarea>
                      <div class="comments-form-footer">
                          <p class="comments-hint">Maksymalnie 1000 znaków.</p>
                          <button class="comments-button" type="submit">Opublikuj komentarz</button>
                      </div>
                  </form>
                  <?php else: ?>
                  <div class="comments-login-box">
                      <p class="comments-login-text">
                          <i class="comments-login-icon fa-regular fa-comment-dots"></i>
                          Aby dodać komentarz, musisz być zalogowany.
                      </p>
                      <div class="comments-login-actions">
                          <a class="comments-button"
                              href="index.php?<?php echo http_build_query(['route' => 'account/login']); ?>">Zaloguj
                              się</a>
                          <a class="comments-button comments-button-outline"
                              href="index.php?<?php echo http_build_query(['route' => 'account/register']); ?>">Załóż
                              konto</a>
                      </div>
                  </div>
                  <?php endif; ?>
                  <?php if (!empty($comments)): ?>
                  <ul class="comments-list">
                      <?php foreach ($comments as $comment): ?>
                      <li class="comments-item">
                          <div class="comments-avatar" aria-hidden="true">
                              <?php echo espaceHtml(mb_strtoupper(mb_substr($comment['username'], 0, 1))); ?>
                          </div>
                          <div class="comments-body">
                              <div class="comments-meta">
                                  <span class="comments-author">
                                      <?php echo espaceHtml($comment['username']); ?>
                                  </span>
                                  <time class="comments-date"
                                      datetime="<?php echo espaceHtml($comment['created_at']); ?>">
                                      <?php echo espaceHtml(date('d.m.Y, H:i', strtotime($comment['created_at']))); ?>
                                  </time>
                              </div>
                              <p class="comments-text"><?php echo nl2br(espaceHtml($comment['content'])); ?></p>
                              <?php if ($currentUser !== null && (int) $currentUser['id'] === (int) $comment['user_id']): ?>
                              <form class="comments-delete-form" method="POST"
                                  action="index.php?<?php echo http_build_query(['route' => 'comments/delete']) ?>">
                                  <?php echo csrfField(); ?>
                                  <input type="hidden" name="commentId"
                                      value="<?php echo espaceHtml($comment['id']); ?>" />
                                  <input type="hidden" name="articleSlug"
                                      value="<?php echo espaceHtml($singleArticle->slug); ?>">
                                  <button class="comments-delete" type="submit">
                                      <i class="fa-regular fa-trash-can"></i> Usuń
                                  </button>
                              </form>
                              <?php endif; ?>
                          </div>
                      </li>
                      <?php endforeach; ?>
                  </ul>
                  <?php else:  ?>
                  <p class="comments-empty">Nie ma jeszcze żadnych komentarzy. Bądź pierwszy!</p>
                  <?php endif; ?>
              </section>
          </section>
      </div>
  </main>