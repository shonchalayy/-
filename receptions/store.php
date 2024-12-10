<?php
/** @var PDO $pdo */
$pdo = require $_SERVER['DOCUMENT_ROOT'] . '/db.php';

$product_id= $_POST['product_id'];
$reception_date= $_POST['reception_date'];
$quantity= $_POST['quantity'];

$pdo->query("INSERT INTO receptions(product_id, reception_date, quantity) VALUES ('$product_id', '$reception_date', '$quantity')");

header('Location: /receptions/');