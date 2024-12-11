<?php
/* @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    $sql = "SELECT
                p.name AS product_name,
                p.price,
                p.article,
                COALESCE(r.reception_date, '') AS reception_date,
                COALESCE(r.quantity, 0) AS quantity
            FROM
                products p
            LEFT JOIN
                receptions r ON p.id = r.product_id
            WHERE
                p.id = :product_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['product_id' => $product_id]);
    $productsWithReceptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($productsWithReceptions) { ?>
        <table>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Артикул</th>
                <th>Дата поступления</th>
                <th>Количество</th>
            </tr>
            <?php foreach ($productsWithReceptions as $productWithReception): ?>
                <tr>
                    <td><?= $productWithReception['product_name'] ?></td>
                    <td><?= $productWithReception['price'] ?></td>
                    <td><?= $productWithReception['article'] ?></td>
                    <td><?= $productWithReception['reception_date'] ?></td>
                    <td><?= $productWithReception['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php } else { ?>
        <p>Продукт не найден</p>
    <?php }
} else {
    echo "<p>ID продукта не указан.</p>";
}
?>