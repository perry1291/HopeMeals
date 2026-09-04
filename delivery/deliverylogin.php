<?php

session_start();
include '../connection.php';

$msg = 0;
$accountError = 0;

if (isset($_POST['sign'])) {

    $email = mysqli_real_escape_string(
        $connection,
        $_POST['email']
    );

    $password = $_POST['password'];

    $sql = "SELECT * FROM delivery_persons WHERE email='$email'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['Did'] = $row['Did'];
            $_SESSION['city'] = $row['city'];

            header("Location: delivery.php");
            exit();

        } else {

            $msg = 1;
        }

    } else {

        $accountError = 1;
    }
}

?>