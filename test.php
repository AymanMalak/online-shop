<?php
include 'inc/header.php';
?>
<div class="col-md-9">
    <div class="contact-form">
        <h2 class="text-primary col-sm-5 m-auto"> Email </h2>

        <form action="handlers/handleTest.php" class="" method="post">
            <div class="form-group py-1">
                <div class="col-sm-10">
                    <input placeholder="First Name" type="text" class="form-control" id="fname" name="fname">
                </div>
            </div>

            <div class="form-group py-1">
                <div class="col-sm-10">
                    <input placeholder="Email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group py-1">
                <div class="col-sm-10">
                    <textarea placeholder="Your Message ..." class="form-control" name="message" rows="5" id="comment"></textarea>
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
<?php include 'inc/footer.php'; ?>