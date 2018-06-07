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

</head>

<body>

    <header class="">
      <h1>HELLLOOOOOOOOOOOOOOOO</h1>
    </header>

  <main class="">
    <?php
      if(!empty($_SESSION['error'])): ?>
      <div class="error box error-box meldingbox">
        <?php echo $_SESSION['error'];?>
      </div>
    <?php endif;?>

    <?php
      if(!empty($_SESSION['info'])): ?>
      <div class="info box info-box meldingbox">
        <?php echo $_SESSION['info'];?>
      </div>
    <?php endif;?>

<?php echo $content;?>

  </main>

  <footer class="">
  </footer>
</body>

</html>
