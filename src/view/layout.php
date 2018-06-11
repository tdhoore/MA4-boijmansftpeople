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
      <h1 class="logo"></h1>
      <img class="bvb" src="#" alt="i.s.m. museum BVB">
      <nav>
        <ul class="nav-list">
          <li class="nav-li">
            <p>Submissions</p>
            <div class="subs-btn"></div>
          </li>
          <li class="b"></li>
          <li class="nav-li">
            <p>Arty Parties</p>
            <div class="party-btn"></div>
          </li>
          <li class="submit-btn"><a>Submit your work</a></li>
       </ul>
      </nav>
    </header>

  <main>

    <?php echo $content;?>

  </main>

  <footer class="footer">
      <address class="address-footer">
      Museumpark 18-20 <br/>
      3015 CX Rotterdam <br/>
      010 44 19 400 <br/>
      info@boijmans.nl
      </address>
      <img src="" alt="Museum Boijmans Van Beuningen">
      <div class="links-footer">
      <a class="a-footer" href="https://www.boijmans.nl/">https://www.boijmans.nl/</a>
      <a class="a-footer" href="http://collectie.boijmans.nl/nl">http://collectie.boijmans.nl/nl</a>
      </div>
  </footer>
  <?php echo $js; ?>
</body>

</html>
