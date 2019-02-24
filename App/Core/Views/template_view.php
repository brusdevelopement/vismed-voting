<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 2:13
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Конкурс Vismed Storyteller</title>
    <!-- Bootstrap CSS -->
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
    <header>
        <h1>Конкурс Vismed Storyteller</h1>
    </header>
	<?php include 'App/Core/Views/'.$content_view; ?>
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