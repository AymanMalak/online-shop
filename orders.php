<?php

include 'inc/header.php';

if (isset($_SESSION['id'])) {
    include 'classes/Product.php';
    include 'classes/Order.php';
    include 'classes/OrderDetails.php';

    $ord = new Order;
    $orders = $ord->getAll();

    if ($orders == null) {
        echo "<div class='alert alert-danger text-center font-weight-bold text-info d-flex justify-content-center align-items-center' style='height:100px'> <h2>There is no Orders </h2></div>";
        echo "<div class='d-flex justify-content-center'><a class='text-center m-auto btn btn-primary' href='products.php'>Back Home </a></div>";
        die();
    }
    $prod = new Product;
    $ordDet = new OrderDetails;
?>

    <style>
        img {
            width: 150px;
            height: 80px;
            max-height: 150px;
            max-width: 150px;
        }

        .table {
            margin: 0;
            padding: 0;
            width: 100%;
            margin: auto;
        }
    </style>

    <div class="container">
        <div class="row my-5">
            <table class="table" border="1">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Product Name</th>
                        <th>Products Price</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php foreach ($orders as $order) {
                        $orderDet = $ordDet->getOne($order['order_id']);
                        $product = $prod->getOne($orderDet['product_id']);
                        $i = 1;
                    ?>
                        <tr>
                            <td scope="row"> <?= $order['customerName']  ?></td>
                            <td> <?= $order['customerEmail']  ?></td>
                            <td> <?= $order['customerPhone']  ?></td>
                            <td> <?= $order['customerAddress']  ?></td>
                            <td> <?= $product['name']  ?></td>
                            <td> <?= $product['price']  ?></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <?php include('inc/footer.php'); ?>

<?php } else {
    header('location:products.php');
} ?>