<?php
include('inc/header.php');

include 'classes/Product.php';
// include 'classes/Category.php';

$id =  $_GET['id'];
$_SESSION['prodID'] = $id;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['cart'])) {
    array_push($_SESSION['cart'], $_SESSION['prodID']);
}

$prod = new Product;
$product =  $prod->getOne($id);
$cat = new Category;
$category =  $cat->getAll();
?>

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    img {
        max-width: 100%;
        width: 100%;
        height: 100%;
        max-height: 540px;
        margin: auto 0;
        border: 1px solid #aaa;
    }
    .loader img{
        border: none;
    }
    .btn {
        margin: 5px 0;
    }
</style>


<div class="container py-3">
    <div class="row">
        <div class="col-md-6 pt-3">
            <img class="card-img-top" src="images/<?= $product['img']; ?>" alt="Card image cap">
        </div>
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-body">
                    <h2 class="card-title "> <span class="text-primary"> <?= $product['name'] ?> </span> </h2>
                    <p class="card-text "> <span class="text-secondary"> <?= $product['desc']; ?> </span> </p>
                    <p> Price : <span class="text-muted"> <?= $product['price'] ?> LE. </span> </p>
                    <p> Quantity : <span class="text-muted"> <?= $product['quantity'] ?> pieces </span> </h3>
                        <?php foreach ($category as $ca) {
                            if ($ca['category_id'] == $product['category_id']) { ?>
                                <p class="d-block">Category : <span class="text-muted"> <?= $ca['type'] ?> </span> </h3>
                            <?php }
                        } ?>
                            <div class="row">
                                <div class="col-lg-3">
                                    <form action="show.php?id=<?= $product['product_id'] ?>" method="post">
                                        <input type="submit" class="btn btn-primary " name="cart" value="Add To Cart">
                                    </form>
                                </div>
                                <?php if (isset($_POST['cart'])) { ?>
                                    <div class="col">
                                        <a href="buyProducts.php" class="btn btn-success">Buy Products</a>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if (isset($_SESSION['id'])) { ?>
                                <a href="edit.php?id=<?= $product['product_id'] ?>" class="btn btn-info ">edit</a>
                                <a href="handlers/handleDelete.php?id=<?= $product['product_id'] ?>" class="btn btn-danger ">delete</a>
                            <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>