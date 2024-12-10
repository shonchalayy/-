<?php global $product;
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$receptions = $pdo->query('SELECT * FROM receptions')
    ->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="style/style.css">
    <title></title>
</head>
<body>
<h2>Список товаров</h2>
<table>
    <thead>
    <tr>
        <td>№</td>
        <td>Name</td>
        <td>Price</td>
        <td>Article</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?=$product['id']?></td>
            <td><?=$product['name']?></td>
            <td><?=$product['price']?></td>
            <td><?=$product['article']?></td>
            <td><a href="products_detail.php?id=<?= $product['id']?>"><button>Подробнее</button></a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="/products/index.php"><button>Товары</button></a>
<h2>Список поступлений</h2>
<table>
    <thead>
    <tr>
        <td>№</td>
        <td>product_id</td>
        <td>Дата поступления</td>
        <td>Количество</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($receptions as $reception): ?>
        <tr>
            <td><?=$reception['id']?></td>
            <td><?=$reception['product_id']?></td>
            <td><?=$reception['reception_date']?></td>
            <td><?=$reception['quantity']?></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="/receptions/index.php"><button>Поступления</button></a>
</body>
</html>
