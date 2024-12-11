<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$receptions = $pdo->query('SELECT receptions. *, products.name AS product FROM receptions LEFT JOIN products ON products.id=receptions.product_id')
    ->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>receptions</title>
</head>
<body>
<h1>Поступления</h1>
<table>
    <thead>
    <tr>
        <td>№</td>
        <td>Товар</td>
        <td>Дата поступления</td>
        <td>Количество</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($receptions as $reception): ?>
        <tr>
            <td><?=$reception['id']?></td>
            <td><?=$reception['product']?></td>
            <td><?=$reception['reception_date']?></td>
            <td><?=$reception['quantity']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="/receptions/create.php" id="btn3"><button>Добавить</button></a>
<a href="/index.php" id="btn5"><button>Главная</button></a>
</body>
</html>
