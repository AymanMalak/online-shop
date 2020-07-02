<?php
include 'inc/header.php';
include 'classes/Product.php';

if (!isset($_SESSION['id'])) {
    header('location:login.php');
    die();
}

?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-6 m-auto ">
            <form method="post" action="handlers/handleAddCat.php" class="p-5 bg-secondary">
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

                <h2 class="text-light pb-2 text-center"> Add Category </h2>
                <div class="form-group">
                    <input type="text" required name="category" placeholder="category" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-dark" value="Add Category">
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