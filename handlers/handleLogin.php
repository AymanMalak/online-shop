<?php

session_start();


require_once '../classes/Admin.php';
require_once '../classes/validation/Validator.php';

use validation\Validator;

// if form is submitted
if ($_POST['submit']) {

    // read data from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validation
    $valid = new validator;
    $valid->rules('email', $email, ['required', 'email', 'max:100']);
    $valid->rules('password', $password, ['required', 'string']);
    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {
        $admin = new Admin;
        $result = $admin->attempt($email, sha1($password));

        //is stored successfully
        if ($result !== null) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header('location:../products.php');

        } else {
            $_SESSION['errors'] =  ['your credentials are not correct'];
            header('location: ../login.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../login.php');
    }
} else {
    header('location: ../login.php');
}