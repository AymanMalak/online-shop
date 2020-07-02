<?php

session_start();

require_once '../classes/Product.php';
require_once '../classes/validation/Validator.php';

use validation\Validator;


// if form is submitted
if ($_POST['submit']) {
    
    $id = $_GET['id'];
    echo "<h1>$id</h1>";
    // read data from form
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];

    // validation
    $valid = new Validator;
    $valid->rules('name',$name,['required','string','max:100']);
    $valid->rules('desc',$desc,['required','string']);
    $valid->rules('price',$price,['required','numeric']);
    $valid->rules('quantity',$quantity,['required','numeric']);
    $valid->rules('category_id',$category_id,['required','numeric']);

    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {
        // update in db
        $data = [
            'name'=> $name ,
            'desc'=> $desc ,
            'price'=> $price ,
            'category_id'=> $category_id ,
            'quantity'=> $quantity ,
        ];
        $prod = new Product;
        $result = $prod->update($id,$data);

        //is updated successfully
        if ($result == true) {

            header('location: ../show.php?id='.$id);
        } else {
            $_SESSION['errors'] = ['error update in database'];
            header('location:../edit.php?id='.$id);
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../edit.php?id='.$id);
    }
} else {
    header('location: ../edit.php?id='.$id);
}
