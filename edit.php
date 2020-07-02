<?php
include 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Category.php';

$id =  $_GET['id'];
$prod = new Product;

$product =  $prod->getOne($id);
$cat = new Category;

$category =  $cat->getAll();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
    die();
}
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 m-auto ">
            <?php if (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $error) { ?>
                        <p class="text-center"> <?= $error  ?> </p>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php unset($_SESSION['errors']); ?>

            <form method="post" class="bg-secondary p-3" action="handlers/handleEdit.php?id=<?= $product['product_id'] ?>" enctype="multipart/form-data">
                <h2 class="text-center text-light pb-3"> Edit Product </h2>
                <div class="form-group">
                    <input required type="text" name="name" class="form-control" placeholder="name" value="<?= $product['name'] ?>">
                </div>

                <div class="form-group">
                    <input required type="text" name="price" class="form-control" placeholder="price" value="<?= $product['price'] ?>">
                </div>

                <div class="form-group">
                    <select class="my-2 custom-select" name="category_id" id="">
                        <?php foreach ($category as $cat) { ?>
                            <option value="<?= $cat['category_id']; ?>" <?= ($cat['category_id'] == $product['category_id']) ?   'selected' :  '' ?>>
                                <?= $cat['type'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <input required type="text" name="quantity" class="form-control" placeholder="quantity" value="<?= $product['quantity'] ?>">
                </div>

                <div class="form-group">
                    <textarea type="text" rows="9" name="desc" class="form-control" placeholder="description"><?= $product['desc'] ?></textarea>
                </div>

                <div class="form-group">
                    <input required type="submit" name="submit" class="btn btn-dark" value="Update">
                </div>

            </form>

        </div>
    </div>
</div>


<?php include('inc/footer.php'); ?>