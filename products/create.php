<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Добавить запись</h1>
<form action="/products/store.php" method="post">
    <input type="text" name="name" id="name" placeholder="name">
    <input type="number" name="price" id="price" placeholder="price">
    <input type="text" name="article" id="article" placeholder="article">
    <input type="submit" name="Отправить" id="btn2">
</form>
</body>
</html>
