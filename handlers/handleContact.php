<?php

require_once '../classes/Contact.php';
require_once '../classes/validation/Validator.php';

use validation\Validator;

session_start();

// if form is submitted
if ($_POST['submit']) {

    // read data from form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // validation
    $valid = new Validator;
    $valid->rules('fname', $fname, ['required', 'string', 'max:100']);
    $valid->rules('lname', $lname, ['required', 'string', 'max:100']);
    $valid->rules('email', $email, ['required', 'email']);
    $valid->rules('message', $message, ['required', 'string', 'max:100']);

    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {

        // store in db
        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'message' => $message,
        ];

        $contact = new Contact;
        $result1 = $contact->store($data);

        //is stored successfully
        if ($result1 == true) {
            header('location:../contact.php');
            $_SESSION['success1'] = ['Your Message has been Sent Successfully'];
            $_SESSION['success2'] = [' <h3> Thanks for contacting us </h3> <p> You are very important to us. All information received will always be confidential, and we will contact you soon once we review your message                                        </p>'];
            $_SESSION['cart'] = [];
        } else {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../contact.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../contact.php');
    }
} else {
    header('location: ../contact.php');
}
