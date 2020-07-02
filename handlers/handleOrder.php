<?php
require_once '../classes/Product.php';
require_once '../classes/Order.php';
require_once '../classes/OrderDetails.php';
require_once '../classes/Category.php';
require_once '../classes/validation/Validator.php';

use PHPMailer\PHPMailer\PHPMailer;
use validation\Validator;



session_start();


// if form is submitted
if ($_POST['submit']) {


    // read data from form
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // validation
    $valid = new Validator;
    $valid->rules('name', $name, ['required', 'string', 'max:100']);
    $valid->rules('phone', $phone, ['required', 'numeric']);
    $valid->rules('email', $email, ['required', 'email']);
    $valid->rules('address', $address, ['required', 'string', 'max:100']);

    $errors = $valid->errors;

    // if data is valid
    if ($errors == []) {
        // store in db
        $data = [
            'customerName' => $name,
            'customerEmail' => $email,
            'customerPhone' => $phone,
            'customerAddress' => $address,
        ];


        $order = new Order;
        $result1 = $order->store($data);

        foreach ($_SESSION['cart'] as $cartID) {
            $prod = new Product;
            $product = $prod->getOne($cartID);

            $cat = new Category;
            $category = $cat->getOne($product['product_id']);

            $ord = new Order;
            $order = $ord->getOne($email);

            $order_id = $order['order_id'];
            $product_id = $cartID;
            $priceEach = $product['price'];

            $productData = [
                'order_id' => $order_id,
                'product_id' => $product_id,
                'priceEach' => $priceEach
            ];

            $orderdetails = new OrderDetails;
            $result2 =  $orderdetails->store($productData);
        }

        //is stored successfully
        if ($result1 == true && $result2 == true) {
            // Send Email when Confirm buying a product
            require_once '../PHPMailer/PHPMailer.php';
            require_once '../PHPMailer/SMTP.php';
            require_once '../PHPMailer/Exception.php';

            $email = new PHPMailer();

            $email->isSMTP();
            $email->Host = "smtp.gmail.com";
            $email->SMTPAuth =  true;
            $email->Username = "aymanmalak312@gmail.com";
            $email->Password = 'ahmed0184969584';
            $email->Port = 465;
            $email->SMTPSecure = "ssl";

            // Email Setting 
            $email->isHTML(true);
            $email->setFrom("aymanmalak312@gmail.com");
            $email->addAddress("aymanmalak36@gmail.com");
            $email->Subject = "Online Shop";
            $email->Body = "New Product has been ordered Please Check it";

            $email->send();
            
            header('location:../products.php');
            // $_SESSION['success'] = ['Your Information has been Sent Successfully'];
            $_SESSION['cart'] = [];
        } else {
            $_SESSION['errors'] = ['error storing in database'];
            header('location:../buyProducts.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location:../buyProducts.php');
    }
} else {
    header('location: ../buyProducts.php');
}
