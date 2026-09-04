  <h4><?php var_dump($singleArticle); ?></h4>
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
                          <img class="single-article-image" src="./img/hero-image.jpg"
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
          </section>
      </div>
  </main>