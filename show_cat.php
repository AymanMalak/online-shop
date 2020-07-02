<?php
include('inc/header.php');
// session_start();
include 'classes/Product.php';
// include 'classes/Category.php';
include 'classes/helpers/Str.php';

$id = $_GET['id'];
$_SESSION['cat'] = $id;
$prods = new Product;
$products = $prods->getCat($_SESSION['cat']);

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
          max-height: 230px;
          height: 230px;
     }
</style>

<div class="container py-4">
     <div class="row">
          <?php foreach ($products as $product) { ?>
               <div class="col-md-4">
                    <div class="card my-3" style="border:2px solid #aaa" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="300" data-aos-easing="ease">
                         <img class="card-img-top" src="images/<?= $product['img']; ?>" alt="Card image cap">
                         <div class="card-body" style="border-top: 1px solid #aaa;">
                              <h3 class="card-title"> <?= $product['name'] ?> </h3>
                              <h5 class="text-primary"> $<?= $product['price'] ?> </h5>
                              <p class="card-text text-muted"> <?= str::limit($product['desc']); ?> </p>
                              <a href="show.php?id=<?= $product['product_id'] ?>" class="btn btn-primary">show</a>
                              <?php if (isset($_SESSION['id'])) { ?>
                                   <a href="edit.php?id=<?= $product['product_id'] ?>" class="btn btn-info">edit</a>
                                   <a href="handlers/handleDelete.php?id=<?= $product['product_id'] ?>" class="btn btn-danger">delete</a>
                              <?php } ?>
                         </div>
                    </div>
               </div>
          <?php } ?>
     </div>
</div>

<?php include('inc/footer.php'); ?>

<script>
     $(document).ready(function() {
          AOS.init();
     });
</script>