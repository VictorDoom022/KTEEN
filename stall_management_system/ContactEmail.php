<?php
//require_once('../config.php');
include 'Email.php';

if (isset($_POST['name']) && isset($_POST['company_name']) && isset($_POST['email']) && isset($_POST['title']) && isset($_POST['context'])) {
    $name = $_POST['name']; 
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $context = $_POST['context'];

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $datetime = date("Y/m/d h:i:sa");
    $stall_username = $_SESSION['stall_username'];
    $kteen_stall_id = $_SESSION['kteen_stall_id'];

    $mail = new Email(true);
    try {
        // $mail->readyMail();
        // $mail->senderName("IDK");
        // //Server email to receive from customer.
        // $mail->toAddress("vector1998@hotmail.com");
        // $mail->isHtml(true);
        //  $mail->setSubject("IDK");
        //  $mail->setBody(123);
        // $mail->setAltBody("$context . '<br> <br> Sent On: ' . $datetime . '<br> Sent by: ' . $stall_username");
        $mail->readyMail();
        $mail->senderName($company_name);
        //Server email to receive from customer.
        $mail->toAddress($email);
        $mail->isHtml(true);
        $mail->setSubject($title);
        $mail->setBody($context . '<br> <br> Sent On: ' . $datetime . '<br> Sent by: ' . $stall_username);
        $mail->setAltBody($context . '<br> <br> Sent On: ' . $datetime . '<br> Sent by: ' . $stall_username);

        $mail->sendMail();
        echo "
            <script>
                alert('E-mail sent!');
                
            </script>";

        echo $sql = "INSERT INTO purchase(stall_ID, date,content, product_name, price, quantity,total) values('$kteen_stall_id', '$datetime','$context', '$product_name', '$price', '$quantity', '$total')";
        mysqli_query($conn, $sql);
      
    } catch (Exception $e) {
        echo $e;
    }
}

?>