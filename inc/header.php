<?php

session_start();
require_once 'classes/Category.php';
$cat = new Category;
$categories = $cat->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Shop</title>
  <!-- Font Awesome for Icoons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Animation for Cards -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/index_style2.css">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="nav-link font-weight-bold" href="products.php">Online Shop </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse m-auto" id="navbarNav">
      <ul class="navbar-nav mr-auto row justify-content-center">
        <li id="drop1" class="dropdown nav-item pl-3 ">
          <a class="bg-transparent dropdown-toggle nav-link" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laptops</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php foreach ($categories as $category) {
              if ($category['category_id'] == '6' || $category['category_id'] == '7' || $category['category_id'] == '8') {
            ?>
                <a class="dropdown-item" href="show_cat.php?id=<?= $category['category_id']; ?>"><?= $category['type']; ?></a>
            <?php }
            } ?>

          </div>
        </li>

        <li id="drop2" class="dropdown nav-item pl-3 ">
          <a class="bg-transparent dropdown-toggle nav-link" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mobiles</a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <?php foreach ($categories as $category) {
              if (!($category['category_id'] == '6') && !($category['category_id'] == '7') && !($category['category_id'] == '8')) {
            ?>
                <a class="dropdown-item" href="show_cat.php?id=<?= $category['category_id']; ?>"><?= $category['type']; ?></a>
            <?php }
            } ?>
          </div>
        </li>

        <?php if (isset($_SESSION['id'])) { ?>

          <li class="nav-item pl-3">
            <a class="nav-link" href="add.php">New Product</a>
          </li>

          <li class="nav-item pl-3">
            <a class="nav-link" href="addCat.php">New Category</a>
          </li>

          <li class="nav-item pl-3">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>

        <?php } ?>
      </ul>

      <div class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About Us</a>
        </li>
        <?php if (isset($_SESSION['id'])) { ?>
          <a class="nav-link disabled" disbaled href="#"> Admin : <?= $_SESSION['username'];  ?> </a>
          <a class="nav-link" href="handlers/handleLogout.php">Logout</a>
        <?php } ?>
        <?php if (!isset($_SESSION['id'])) { ?>
          <a class="nav-link " href="login.php">Login As Admin</a>
        <?php } ?>

      </div>
    </div>
  </nav>

  <style>
    * {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      font-family: Tahoma;
      background-color: #eee;
    }

    a.nav-link {
      cursor: pointer;
    }

    .nav-link.font-weight-bold {
      color: dodgerblue !important;
    }

    .nav-link.font-weight-bold:hover {
      color: #eee !important;
      transition: .5s color ease;
    }

    .nav-link.disabled {
      color: #aaa !important;
      cursor: default;
    }

    .nav-link.disabled:hover {
      color: #aaa !important;
      transition: .01s color ease;
    }

    .nav-link {
      color: #fff !important;
      transition: .5s color ease;
    }

    .nav-link:hover,
    .dropdown button.bg-transparent:hover {
      color: #09c !important;
      transition: .5s color ease;
    }

    .dropdown button.bg-transparent {
      color: #fff
    }
  </style>

  <!-- Loading Image -->
  <div class="loader">
    <img src="images/preloader/Preloader_2.gif" alt="">
  </div>
