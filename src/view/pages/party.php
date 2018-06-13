<section class="party-section1">
    <h1 class="header-h1" data-content="arty parties" >Arty Parties</h1>
    <section class="next-party-section">
      <header>
        <h2 class="next-party-title">Next Arty Party:</h2>
      </header>
      <section class="next-party-info">
        <div class="next-party-date">
          <p class="next-party-day"><?php echo $popups[0]['day']; ?></p>
          <p class="next-party-month"><?php echo $popups[0]['month']; ?></p>
        </div>
        <p class="location-name" data-content="biergarten"><?php echo $popups[0]['data']['locatieNaam']; ?></p>
        <address class="location-address">
          <?php echo $popups[0]['data']['adress']; ?>
        </address>
      </section>
    </section>
    <div class="party-tagline">
      <p>
        Every last <strong>friday</strong> of the month <br/>
        <strong>afterwork</strong> <br/>
        drinks, music, <strong>ART</strong>
      </p>
    </div>
    <nav class="social-link-nav">
      <ul class="social-link-ul">
        <li class="social-link-maps"><a class="social-a" target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo str_replace('<br/>', '%20', $popups[0]['data']['adress']); ?>" target="_blank"><div class="social-icon"></div><span class="social-link-cta">Open in Maps</span></a></li>
        <li class="social-link-fb"><a class="social-a" target="_blank" href="https://www.facebook.com/events/614815452244683/"><div class="social-icon"></div><span class="social-link-cta">I'm interested!</span></a></li>
        <li class="social-link-tt"><a class="social-a" target="_blank" href="https://twitter.com/intent/tweet?text=This%20party%20looks%20like%20fun!%20https://www.facebook.com/events/614815452244683/"><div class="social-icon"></div><span class="social-link-cta">Tweet it!</span></a></li>
      </ul>
    </nav>
</section>

<section class="party-sections">
  <section class="party-section2">
    <h2 class="party-section2-title">Upcoming Arty Parties:</h2>
    <?php foreach ($popups as $key => $value) {
            if($key > 0) {?>
    <article class="upcoming-party-article">
      <div class="next-party-date">
<?php echo $value['day']; ?></p>
        <p class="next-party-month"><?php echo $value['month']; ?></p>
      </div>
      <p class="upcoming-location-name">
        <?php echo $value['data']['locatieNaam']; ?>
      </p>
      <address class="upcoming-address">
        <?php echo $value['data']['adress']; ?>
      </address>
    </article>
    <?php } } ?>
  </section>

  <section class="party-section3">
    <h2 class="party-section3-title">We missed you here:</h2>
    <picture>
      <source srcset="assets/img/parties/party1-253.webp" type="image/webp" />
      <source srcset="assets/img/parties/party1-253.png" type="image/png" />
      <img class="party1-img" height="207" width="253" src="assets/img/parties/party1-253.jpg" alt="Arty Party May">
    </picture>
    <picture>
      <source srcset="assets/img/parties/party2-253.webp" type="image/webp" />
      <source srcset="assets/img/parties/party2-253.png" type="image/png" />
      <img class="party2-img" height="207" width="253" src="assets/img/parties/party2-253.jpg" alt="Arty Party May">
    </picture>
    <picture>
      <source srcset="assets/img/parties/party3-253.webp" type="image/webp" />
      <source srcset="assets/img/parties/party3-253.png" type="image/png" />
      <img class="party3-img" height="207" width="253" src="assets/img/parties/party3-253.jpg" alt="Arty Party May">
    </picture>
    <picture>
      <source srcset="assets/img/parties/party4-253.webp" type="image/webp" />
      <source srcset="assets/img/parties/party4-253.png" type="image/png" />
      <img class="party4-img" height="207" width="253" src="assets/img/parties/party4-253.jpg" alt="Arty Party May">
    </picture>
  </section>
</section>
