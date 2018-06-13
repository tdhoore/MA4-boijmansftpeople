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
    <?php echo $css;?>

</head>

<body>

    <header class="header">
      <h1 class="hide">Boijmans for the people</h1>
      <nav>
        <ul class="nav-list">
          <li class="b">
            <a href="index.php">
              <img src="assets/img/logo-b-mobile-nav.svg" alt="bftp logo" width="54" height="54">
            </a>
          </li>
          <li>
            <a href="https://www.boijmans.nl/">
              <img class="bvb" src="assets/img/mbvb-logo.svg" alt="i.s.m. museum BVB" width="200" height="55">
            </a>
          </li>
          <li class="sub-li">
            <a href="index.php?page=subs" class="nav-li">
              <p class="<?php if($currentPage == 'subs') echo 'menuitem--active';?>">Submissions</p>
              <div class="subs-btn <?php if($currentPage == 'subs') echo 'subs-btn-active';?>"></div>
            </a>
          </li>
          <li class="">
            <a href="index.php?page=party" class="nav-li">
              <p class="<?php if($currentPage == 'subs') echo 'menuitem--active';?>">Arty Parties</p>
              <div class="party-btn <?php if($currentPage == 'party') echo 'party-btn-active';?>"></div>
            </a>
          </li>
          <li class="">
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
