<?php

session_start();
include '../connection.php';

$acc = 0;
$msg = 0;
$loginError = 0;

/* =========================
   ADMIN REGISTRATION
========================= */

if (isset($_POST['signup'])) {

    $username = mysqli_real_escape_string(
        $connection,
        $_POST['name']
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

    $pass = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "SELECT * FROM admin WHERE email='$email'";

    $result = mysqli_query(
        $connection,
        $sql
    );

    if (mysqli_num_rows($result) === 1) {

        $acc = 1;

    } else {

        $query = "INSERT INTO admin
            (name, email, password, location)
            VALUES
            ('$username', '$email', '$pass', '$location')";

        $query_run = mysqli_query(
            $connection,
            $query
        );

        if ($query_run) {
            $msg = 1;
        } else {
            echo '<script>
                alert("Data could not be saved");
            </script>';
        }
    }
}


/* =========================
   ADMIN LOGIN
========================= */

if (isset($_POST['Login'])) {

    $email = mysqli_real_escape_string(
        $connection,
        $_POST['email']
    );

    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email='$email'";

    $result = mysqli_query(
        $connection,
        $sql
    );

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (
            password_verify(
                $password,
                $row['password']
            )
        ) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['location'] = $row['location'];

            header("Location: admin.php");
            exit();

        } else {

            $loginError = 1;
        }

    } else {

        $loginError = 2;
    }
}

?>