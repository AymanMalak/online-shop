<?php
include 'inc/header.php';

include 'classes/Product.php';
?>

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    img {
        width: 150px;
        height: 80px;
    }

    form {
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="py-2">
            <table class="table" border="1">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cartID) {
                            $prod = new Product;
                            $product = $prod->getOne($cartID);
                            $cat = new Category;
                            $category = $cat->getOne($product['category_id']);
                    ?>
                            <tr>
                                <td scope="row"> <?= $product['name']  ?></td>
                                <td> <?= $product['desc']  ?></td>
                                <td> <?= $product['price']  ?></td>
                                <td>
                                    <img width="50px" height="50px" class="card-img-top" src="images/<?= $product['img']; ?>" alt="Card image cap">
                                </td>
                                <td> <?= $category['type']  ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <?= "<div class='alert alert-info text-center text-danger font-weight-bold'> You could buy one product only at a time </div>" ?>
    <div class="row">
        <div class="bg-info px-0 mx-0 py-5 w-100">
            <form class="m-auto w-50 bg-light p-4" action="handlers/handleOrder.php" method="post">
                <!-- Error Messsage -->
                <?php if (isset($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <p class="text-center"> <?= $error  ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']); ?>

                <h2 class="text-primary text-center pb-2"> Customer Details : </h2>
                <div class="form-group">
                    <input type="text" required name="name" class="form-control" placeholder="Customer Name">
                </div>

                <div class="form-group">
                    <input type="text" required name="phone" class="form-control" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <input type="email" required name="email" class="form-control" placeholder="Customer Email">
                </div>

                <div class="form-group">
                    <input type="text" required name="address" class="form-control" placeholder="Customer Address">
                </div>

                <div class="form-group text-center">
                    <input type="submit" name="submit" class="btn btn-primary form-control" value="Checkout">
                </div>

            </form>
        </div>
    </div>
</div>


<?php include('inc/footer.php'); ?>