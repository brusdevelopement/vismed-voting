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
	<title>Главная</title>
</head>
<body>
    <header>
        <h1>Запчасти для иномарок</h1>
    </header>
    <nav>
        <a href="/">Главная</a> | <a href="/search">Поиск</a>
    </nav>
	<?php include 'App/Core/Views/'.$content_view; ?>
</body>
</html>