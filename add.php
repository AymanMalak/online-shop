<?php
include('inc/header.php');
include 'classes/Product.php';

$cat = new Category;
$category =  $cat->getAll();

if (!isset($_SESSION['id'])) {
    header('location:login.php');
    die();
}
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 m-auto ">
            <form method="post" action="handlers/handleAdd.php" enctype="multipart/form-data" class="bg-secondary m-auto p-3 pb-0">
                <?php if (isset($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <p class="text-center"> <?= $error  ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']); ?>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success">
                        <?php foreach ($_SESSION['success'] as $success) { ?>
                            <p class="text-center"> <?= $success  ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['success']); ?>

                <h2 class="text-light pb-2 text-center"> Add Product </h2>

                <div class="form-group">
                    <input required type="text" name="name" class="form-control" placeholder="name">
                </div>

                <div class="form-group">
                    <input required type="text" name="price" class="form-control" placeholder="price">
                </div>

                <div class="form-group">
                    <input required type="text" name="quantity" class="form-control" placeholder="quantity">
                </div>

                <div class="form-group">
                    <select class="my-2 custom-select" name="category_id" id="">
                        <?php foreach ($category as $cat) { ?>
                            <option value="<?= $cat['category_id']; ?>"> <?= $cat['type'] ?> </option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="form-group">
                    <input required type="file" name="img" class="form-control-file text-light text-center">
                </div>

                <div class="form-group">
                    <textarea required type="text" rows="6" name="desc" class="form-control" placeholder="description"></textarea>
                </div>


                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-dark" value="Add Product">
                </div>

            </form>

        </div>

    </div>
</div>

<style>
    form {
        border-radius: 10px;
    }
</style>
<?php include('inc/footer.php'); ?>