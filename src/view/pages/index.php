<section class="index-section1">
  <h2 class="<?php if($currentPage == 'index') echo 'logo';?>"><span class="hide">logo BFTP</span></h2>
    <h3 class="index-tagline"><span class="hide">4 years - your art on our walls</span></h3>
    <div class="shirl-div">
      <picture class="shirley">
        <source srcset="assets/img/shirley-temple-small.webp" media="(max-width: 768px)" type="image/webp" />
        <source srcset="assets/img/shirley-temple-small.jpg" media="(max-width: 768px)" type="image/png" />
          <source srcset="assets/img/shirley-temple-big.webp" media="(min-width: 769px)" type="image/webp" />
        <source srcset="assets/img/shirley-temple-big.jpg" media="(min-width: 769px)" type="image/png" />
        <img class="shirley" src="assets/img/shirley-temple-big.jpg" alt="Artwork of the month"
        sizes="(max-width: 768px) 100vw,
                (min-width: 769px) 44vw">
      </picture>
    </div>

  <article class="index-article index-article2">
    <div class="a2-container">
      <h2 class="h2-article2">- theme of the month</h2>
      <h3 class="h3-article2">Satire of sexualisation</h3>
      <div class="div-article2">
        <p class="p-article">
          This month’s work is <strong>“Shirley Temple, The Youngest, Most Sacred Monster of the Cinema in Her Time”</strong>, which was made by <strong>Salvador Dali</strong>, the well known surrealist painter. Shirley Temple was a child actress in the mid-thirties. Dali took her head out of a newspaper and superimposed it to the body of a lioness, made to look like a sphinx. That’s why they sometimes call it “Barcelona Sphinx”. The idea behind this work is described as a satire on the sexualisation of child stars by Hollywood.
        </p>
        <p class="p-article">
          <strong>Now it’s your turn</strong> to make a satire on sexualisation. You can start by <strong>downloading this painting</strong> to use as a template, or you can look through different submissions and use <strong>someone else’s submission as a template</strong>. Your only restriction is the size of your artwork should be the size of “Barcelona Sphinx” itself.
        </p>
      </div>
    </div>
    <a href="index.php?page=submit" class="btn-article2">Submit your work</a>
  </article>

  <article class="index-article index-article3">
    <h2 class="winner"><span class="hide">last month's winner</span></h2>
    <picture class="winner-box">
      <source srcset="assets/img/last-winner-small.webp" media="(max-width: 768px)" type="image/webp" />
      <source srcset="assets/img/last-winner-small.jpg" media="(max-width: 768px)" type="image/png" />
      <source srcset="assets/img/last-winner-big.webp" media="(min-width: 769px)" type="image/webp" />
      <source srcset="assets/img/last-winner-big.jpg" media="(min-width: 769px)" type="image/png" />
      <img class="last-winner" src="assets/img/last-winner-big.jpg" alt="last month's winner"
      sizes="(max-width: 768px) 80vw,
              (min-width: 769px) 25vw">
    </picture>
  </article>
</section>

<section class="index-section2">
  <h2 class="h3-article2">submissions of the week</h2>
  <div class="submissions">
    <?php echo implode($artSubs, " "); ?>
  </div>
  <a href="index.php?page=subs" class="btn-article4">More submissions</a>
</section>

<section class="index-section3">
  <h2 class="s3-h2"><span class="hide">Arty parties</span></h2>

  <div class="s3-container">
    <article class="s3-article">
      <h3 class="s3a1-h3">upcoming Arty Party:</h3>

      <div class="s3-div">

        <div class="event">
          <div class="event-div">
            <p class="p-dag">29</p>
            <p class="p-maand">06</p>
          </div>

            <div class="div-place">
              <p class="s3a1-title">Biergarten</p>
              <address class="s3a2-address">
                Schiestraat 18 3013BR <br/>
                Rotterdam Netherlands
              </address>
            </div>
        </div>

          <a href="https://www.facebook.com/events/614815452244683/" class="fb-btn" target="_blank">
            <img src="assets/img/interested-button.svg" alt="facebook event" width="50" height="50" class="fb-btn-img">
          </a>

        </div>
    </article>

    <article class="index-section3">
      <h3 class="hide">Concept</h3>
      <p class="p-article">
        Every last friday of the month, we throw an <strong>after-work party</strong> to close off the theme of the month. We’ll announce <strong>who’s work will be displayed</strong> in Museum Boijmans Van Beuningen when it re-opens, and <strong>announce next month’s theme and painting</strong>. You can sit back and relax, look at everybody’s submission from the last few weeks, or you can do a <strong>collaborative remake</strong> of the new painting.
      </p>
      <a href="index.php?page=party" class="s3-btn">More about this</a>
    </article>
  </div>
</section>

<section class="index-section3 index-section4">
  <h2 class="hide">About</h2>
  <img class="aboutimg" src="assets/img/logo-bftp-about.svg" alt="logo BFTP" width="165" height="165">
  <div class="about-bg">
    <p  class="p-article">
      Each month while Boijmans Van Beuningen is closed, we put one painting from our collection on display for you. There’s a <strong>theme linked to each month</strong>, and your job is to <strong>remake the painting</strong> in question with that theme in mind. You can also choose to work on <strong>someone else’s interpretation</strong> of the painting.
    </p>
  </div>
</section>
