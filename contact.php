<?php
include('inc/header.php');
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .contact {
        padding: 4%;
        height: 400px;
    }

    .col-md-3 {
        background: #aaa;
        color: #fff;
        padding: 4%;
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    .fa-envelope {
        font-size: 70px;
        margin-bottom: 20px;
    }

    .contact-info {
        margin-top: 10%;
    }

    .contact-info img {
        margin-bottom: 15%;
    }

    .contact-info h2 {
        margin-bottom: 10%;
    }

    .col-md-9 {
        background: #fff;
        padding: 3%;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    .contact-form label {
        font-weight: 600;
        color: rgba(0, 0, 0, 0.5);
    }

    .contact-form button:focus {
        box-shadow: none;
    }

    footer {
        position: relative;
        bottom: 0;
        width: 100%;
    }
</style>

<div class="container contact py-4">
    <div class="row">

        <!-- side area -->
        <div class="col-md-3">
            <div class="contact-info">
                <span>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
                <!-- <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" /> -->
                <h2> Contact Us </h2>
                <h4> We want to hear you <span><i class="fa fa-heart-o text-danger" aria-hidden="true"></i></span></h4>
            </div>
        </div>
        <!-- /side area -->

        <!-- Form -->
        <div class="col-md-9">
            <div class="contact-form">
                <h2 class="text-primary col-sm-5"> CONTACT US </h2>
                <form action="handlers/handleContact.php" method="post">

                    <!-- Errors Messages-->
                    <?php if (isset($_SESSION['errors'])) { ?>
                        <div class="alert alert-danger">
                            <?php foreach ($_SESSION['errors'] as $error) { ?>
                                <p class="text-center"> <?= $error  ?> </p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['errors']); ?>
                    <!-- Success1 Messages-->
                    <?php if (isset($_SESSION['success1'])) { ?>
                        <div class="alert alert-success">
                            <?php foreach ($_SESSION['success1'] as $success) { ?>
                                <p class="text-center"> <?= $success  ?> </p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['success1']); ?>
                    <!-- Success2 Messages-->
                    <?php if (isset($_SESSION['success2'])) { ?>
                        <div class='w-100 bg-primary text-white p-3 my-3' style='border-radius: 7px;'>
                            <?php foreach ($_SESSION['success2'] as $success2) { ?>
                                <?= $success2  ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['success2']); ?>

                    <div class="form-group py-1">
                        <div class="col-sm-10">
                            <input required placeholder="First Name" type="text" class="form-control" id="fname" name="fname">
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="col-sm-10">
                            <input required placeholder="Second Name" type="text" class="form-control" id="lname" name="lname">
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="col-sm-10">
                            <input required placeholder="Email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="col-sm-10">
                            <textarea required placeholder="Your Message ..." class="form-control" name="message" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="submit" class="btn btn-dark" value="Send">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- /Form -->

    </div>
</div>


<?php include('inc/footer.php'); ?>