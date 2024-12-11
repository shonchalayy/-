<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$products = $pdo->query('SELECT * FROM products')
    ->fetchAll(PDO::FETCH_ASSOC);
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
<form action="/receptions/store.php" method="post">
    <select name="product_id" id="product">
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="date" name="reception_date" id="date">
    <input type="number" name="quantity" id="quantity" placeholder="количество">
    <input type="submit" name="Отправить" id="btn4">
</form>
</body>
</html>
