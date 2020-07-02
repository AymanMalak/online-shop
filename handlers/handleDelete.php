<?php

session_start();

require_once '../classes/Product.php';

$prod = new Product;

$id = $_GET['id'];

$product = $prod->getOne($id);

$img = $product['img'];

unlink('../images/' . $img);

$result = $prod->delete($id);

if ($result == true) {
    header('location:../products.php');
} else {
    header('location:../products.php');
}
