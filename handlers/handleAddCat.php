<?php

session_start();

require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';

use validation\Validator;

// if form is submitted
if ($_POST['submit']) {

    // read data from form
    $category = $_POST['category'];
    
    // validation
    $valid = new Validator;
    $valid->rules('category',$category,['required','string','max:100']);

    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {

        // store in db
        $data = [
            'type'=> $category
        ];
        $cat = new Category;
        $result = $cat->store($data);

        //is stored successfully
        if ($result == true) {
            header('location:../addCat.php');
            $_SESSION['success'] = ['Category Added Successfully'];
        } else {
            
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../addCat.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../addCat.php');
    }
} else {
    header('location: ../addCat.php');
}
