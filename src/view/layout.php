<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <script>
        WebFontConfig = {
          custom: {
            families: ['futura', 'proxima'],
            urls: ['assets/fonts/futura/futura.css', 'assets/fonts/proxima/proxima.css']
          }
        };

        (function(d) {
           var wf = d.createElement('script'), s = d.scripts[0];
           wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
           wf.async = true;
           s.parentNode.insertBefore(wf, s);
        })(document);
     </script> -->

    <!-- <link rel="icon" href="assets/img/favicon.png"> -->

    <meta name="author" content="Annabel De Pourcq, Tim D'hoore, Billie Vanderhaeghen" />
    <meta name="description" content="Boijmans for the People" />
    <meta name="keywords" content="Boijmans for the People" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>BFTP</title>
    <?php echo $css; ?>

</head>

<body>

    <header class="">
      <nav>
        <ul>
          <li><img src="" alt="logo"></li>
          <li><img src="" alt="ism museum BVB"></li>
          <li>Submissions</li>
          <li>Arty Parties</li>
          <li><a>Submit your work</a></li>
       </ul>
      </nav>
    </header>

  <main>

    <?php echo $content;?>

  </main>

  <footer class="">
      <address>
      Museumpark 18-20
      3015 CX Rotterdam
      010 44 19 400
      info@boijmans.nl
      </address>
      <img src="" alt="Museum Boijmans Van Beuningen">
      <div>
      <a href="https://www.boijmans.nl/">https://www.boijmans.nl/</a>
      <a href="http://collectie.boijmans.nl/nl">http://collectie.boijmans.nl/nl</a>
      </div>
  </footer>
  <?php echo $js; ?>
</body>

</html>
