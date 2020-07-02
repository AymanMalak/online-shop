<?php

session_start();

require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validation/Validator.php';

use helpers\Image;
use validation\Validator;

// if form is submitted
if ($_POST['submit']) {

    // read data from form
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $img = $_FILES['img'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];

    // validation
    $valid = new Validator;
    $valid->rules('name',$name,['required','string','max:100']);
    $valid->rules('desc',$desc,['required','string']);
    $valid->rules('price',$price,['required','numeric']);
    $valid->rules('img',$img,['required-img','image']);
    $valid->rules('category_id',$category_id,['required','numeric']);
    $valid->rules('quantity',$quantity,['required','numeric']);

    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {

        $image = new Image($img);
        
        // store in db
        $data = [
            'name'=> $name ,
            'desc'=> $desc ,
            'price'=> $price ,
            'img' => $image->new_name,
            'category_id' => $category_id,
            'quantity' => $quantity
        ];
        $prod = new Product;
        $result = $prod->store($data);

        //is stored successfully
        if ($result == true) {
            $image->upload();
            header('location:../add.php');
            $_SESSION['success'] = ['Product Added Successfully'];
        } else {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../add.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../add.php');
    }
} else {
    header('location: ../add.php');
}
