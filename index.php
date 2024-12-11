<?php
/* @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$sql = "SELECT 
            p.*,
            (SELECT SUM(quantity) FROM receptions WHERE product_id = p.id) AS total_quantity_on_stock
        FROM 
            products p";

$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$receptions = $pdo->query('SELECT r.id, p.name AS product, r.reception_date, r.quantity FROM receptions r LEFT JOIN products p ON p.id = r.product_id')->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Товары</title>
</head>
<body>
<h2>Список товаров</h2>
<table>
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Article</td>
        <td>На складе</td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['article'] ?></td>
            <td><?= $product['total_quantity_on_stock'] ?: 0 ?></td>
            <td><a href="products_detail.php?id=<?= $product['id'] ?>"><button>Подробнее</button></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="/products/index.php"><button>Товары</button></a>
<h2>Список поступлений</h2>
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
            <td><?= $reception['id'] ?></td>
            <td><?= $reception['product'] ?></td>
            <td><?= $reception['reception_date'] ?></td>
            <td><?= $reception['quantity'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="/receptions/index.php"><button>Товары</button></a>
</body>
</html>
