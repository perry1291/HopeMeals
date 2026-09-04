<?php

include '../connection.php';

$accountExists = false;
$error = false;

if (isset($_POST['sign'])) {

    $username = mysqli_real_escape_string(
        $connection,
        $_POST['username']
    );

    $email = mysqli_real_escape_string(
        $connection,
        $_POST['email']
    );

    $password = $_POST['password'];

    $location = mysqli_real_escape_string(
        $connection,
        $_POST['district']
    );

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "SELECT * FROM delivery_persons WHERE email='$email'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) === 1) {

        $accountExists = true;

    } else {

        $query = "INSERT INTO delivery_persons
                  (name, email, password, city)
                  VALUES
                  ('$username', '$email', '$hashedPassword', '$location')";

        $queryRun = mysqli_query(
            $connection,
            $query
        );

        if ($queryRun) {

            header("Location: deliverylogin.php");
            exit();

        } else {

            $error = true;
        }
    }
}

?>