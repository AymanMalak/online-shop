<?php
include 'inc/header.php';
include 'classes/Product.php';

if (isset($_SESSION['id'])) {
    header('location:home.php');
    die();
}
?>

<div class="container">
    <div class="row py-4">
        <div class="col-md-6 m-auto">
            <form method="post" action="handlers/handleLogin.php" class="text-light p-5">
                <!-- Errors Messages -->
                <?php if (isset($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <p class="text-center"> <?= $error  ?> </p>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php unset($_SESSION['errors']); ?>
                
                <h2 class="text-light text-center pb-2"> Login As Admin : </h2>
                <div class="form-group">
                    <label for="email" class="text-light">Email :</label><br>
                    <input required type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password" class="text-light">Password :</label><br>
                    <input required type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-dark" value="Login">
                </div>

            </form>

        </div>

    </div>
</div>
<style>
    form {
        border-radius: 10px;
        background-color: #aaa;
    }
</style>

<?php include('inc/footer.php'); ?>