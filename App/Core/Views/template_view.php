<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 2:13
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IT=edge,chrome=IE8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Конкурс Vismed Storyteller</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/App/css/main.css?v=5">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <?php
    if(!$data){
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <?php
    }
    ?>
</head>
<body>
<div id="bg"></div>
    <header>
    <svg class="float-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.9 72.1" id="logo-v"><path d="M22 0C15.7 2.8 10.2 7.3 6.2 13.4c-11.5 17.3-6.5 40.8 11 52.3 17.5 11.6 41 6.9 52.5-10.4.8-1.3 1.5-2.6 2.2-3.9l-.9 1.5C59.5 70.3 36.2 75.3 19.1 64 1.9 52.7-2.6 29.5 8.9 12.1 12.4 6.9 16.9 2.9 22 0" class="st0"></path><path d="M12.2 45.6h-2L2.7 25.1h3.9l4.7 13.6 4.9-13.6h3.9l-7.9 20.5M22.3 25.1h3.6v20.2h-3.6zM29.1 44.2l1.3-3.2c1.4 1 2.8 1.5 4.2 1.5 2.1 0 3.2-.7 3.2-2.2 0-.7-.2-1.3-.7-2-.5-.6-1.5-1.3-3.1-2.1-1.5-.8-2.6-1.4-3.1-1.9s-.9-1.1-1.2-1.8c-.3-.7-.4-1.5-.4-2.3 0-1.6.6-2.9 1.7-3.9s2.6-1.5 4.4-1.5c2.3 0 4 .4 5.1 1.3l-1.1 3.1c-1.3-.9-2.6-1.4-4-1.4-.8 0-1.5.2-1.9.7-.5.4-.7 1-.7 1.7 0 1.2 1.3 2.4 3.8 3.6 1.3.7 2.3 1.3 2.9 1.8.6.6 1.1 1.2 1.4 1.9.3.7.5 1.6.5 2.5 0 1.6-.6 3-1.9 4-1.3 1.1-3 1.6-5.2 1.6-2 0-3.7-.5-5.2-1.4M63.3 45.3h-3.5l-2.1-10.9-4 11.2h-1.3l-4.1-11.2-2.2 10.9h-3.4l4-20.2h1.9L53 38.7l4.3-13.6h1.9l4.1 20.2M69.1 28.3V33h6.6v3.1h-6.6v6h9.1v3.2H65.5V25.1h12.9v3.2h-9.3M85.1 28.2V42c.6.1 1.2.1 1.9.1 1.8 0 3.2-.7 4.2-2s1.5-3.1 1.5-5.5c0-4.3-2-6.5-6-6.5-.3 0-.9.1-1.6.1m.9 17.1h-4.5V25.1c2.9-.1 4.7-.2 5.4-.2 2.9 0 5.3.9 7 2.6 1.7 1.7 2.6 4 2.6 6.9 0 7.3-3.5 10.9-10.5 10.9zM97.1 27h.4c.3 0 .5 0 .5-.4 0-.3-.3-.4-.5-.4h-.4v.8m-.4-1.1h1c.6 0 1 .2 1 .8 0 .4-.3.7-.7.7l.7 1.1h-.5l-.7-1.1h-.3v1.1h-.5v-2.6zm2.6 1.3c0-1.1-.8-1.9-1.7-1.9-1 0-1.7.8-1.7 1.9 0 1.1.8 1.9 1.7 1.9.9 0 1.7-.8 1.7-1.9zm-4.1 0c0-1.3 1-2.3 2.3-2.3 1.3 0 2.3 1 2.3 2.3 0 1.3-1 2.3-2.3 2.3-1.2 0-2.3-1-2.3-2.3z" class="st0"></path></svg>
        <img id="logo-s" class="float-right" src="/App/img/stada-w.png">
        <h1 class="title container text-center">Конкурс Vismed Storyteller</h1>
    </header>
<img id="pack" src="/App/img/vismed-packs-big.png">
<div id="intro">
<?php include _CORE_DIR_.'/Views/'.$content_view; ?>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="/App/js/voting.js"></script>
    <?php
    if(!$data){
        ?>
        <script src="/App/js/gchartloader.js"></script>
        <?php
    }
    ?>
</body>
</html>