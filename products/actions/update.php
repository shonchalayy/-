<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';
$id= $_POST['id'];
$name= $_POST['name'];
$products = $pdo->query("UPDATE products SET name='$name' WHERE id=" . $id);
header('Location: /products/');

