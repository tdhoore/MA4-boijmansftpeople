<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
        WebFontConfig = {
          custom: {
            families: ['lemonmilk'],
            urls: ['assets/fonts/lemonmilk/fonts.css']
          }
        };

        (function(d) {
           var wf = d.createElement('script'), s = d.scripts[0];
           wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
           wf.async = true;
           s.parentNode.insertBefore(wf, s);
        })(document);
     </script>

    <!-- <link rel="icon" href="assets/img/favicon.png"> -->

    <meta name="author" content="Annabel De Pourcq, Tim D'hoore, Billie Vanderhaeghen" />
    <meta name="description" content="Boijmans for the People" />
    <meta name="keywords" content="Boijmans for the People" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>BFTP</title>
    <link rel="shortcut icon" href="assets/img/favico/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favico/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favico/manifest.json">
    <meta name="msapplication-TileColor" content="#323392">
    <meta name="msapplication-TileImage" content="assets/img/favico/ms-icon-144x144.png">
    <meta name="theme-color" content="#323392">
    <?php echo $css;?>
</head>

<body>

    <header class="header">
      <h1 class="hide">Boijmans for the people</h1>
      <nav class="nav-bftp">
        <ul class="nav-list">
          <li class="b sub-li">
            <a href="index.php">
              <img src="assets/img/logo-b-mobile-nav.svg" alt="bftp logo" width="54" height="54">
            </a>
          </li>
          <li class="sub-li boijmans">
            <a href="https://www.boijmans.nl/" target="_blank">
              <img class="bvb" src="assets/img/mbvb-logo.svg" alt="i.s.m. museum BVB" width="200" height="55">
            </a>
          </li>
          <li class="sub-li">
            <a href="index.php?page=subs" class="nav-li">
              <p class="<?php if($currentPage == 'subs') echo 'menuitem--active';?>">Submissions</p>
              <div class="subs-btn <?php if($currentPage == 'subs') echo 'subs-btn-active';?>"></div>
            </a>
          </li>
          <li class="sub-li">
            <a href="index.php?page=party" class="nav-li">
              <p class="<?php if($currentPage == 'party') echo 'menuitem--active';?>">Arty Parties</p>
              <div class="party-btn <?php if($currentPage == 'party') echo 'party-btn-active';?>"></div>
            </a>
          </li>
          <li class="sub-li submitYourWork">
            <a href="index.php?page=submit" class="submit-btn">Submit your work</a>
          </li>
       </ul>
      </nav>
    </header>

  <main>

    <?php echo $content;?>

  </main>

  <footer class="footer">
      <div class="footerfooter">
        <address class="address-footer">
        Museumpark 18-20 <br/>
        3015 CX Rotterdam <br/>
        010 44 19 400 <br/>
        info@boijmans.nl
        </address>
        <img src="assets/img/mbvb-logo-footer.svg" alt="Museum Boijmans Van Beuningen" width="275" height="47">
        <div class="links-footer">
        <a class="a-footer" href="https://www.boijmans.nl/">https://www.boijmans.nl/</a>
        <a class="a-footer" href="http://collectie.boijmans.nl/nl">http://collectie.boijmans.nl/nl</a>
        </div>
      </div>
  </footer>
  <?php echo $js; ?>
</body>

</html>
