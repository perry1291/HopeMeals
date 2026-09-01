<?php
session_start();
include 'connection.php';

if (isset($_POST['sign'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['gender'] = $row['gender'];

            header("Location: home.html");
            exit();

        } else {
            echo "<h1><center>Incorrect password</center></h1>";
        }

    } else {
        echo "<h1><center>Account does not exist</center></h1>";
    }
}
?>