<?php
session_start();
include 'connection.php';

$msg = 0;

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
            $msg = 1;
        }

    } else {
        $msg = 2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>HopeMeals | Sign In</title>

    <link rel="stylesheet" href="loginstyle.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>

    <style>
        .uil {
            top: 42%;
        }
    </style>

    <div class="container">

        <div class="regform">

            <form action="" method="post">

                <p class="logo">
                    Hope <b style="color:#06C167;">Meals</b>
                </p>

                <p id="heading">Welcome back!</p>

                <div class="input">

                    <input
                        type="email"
                        placeholder="Email address"
                        name="email"
                        required>

                </div>

                <div class="password">

                    <input
                        type="password"
                        placeholder="Password"
                        name="password"
                        id="password"
                        required>

                    <i class="uil uil-eye-slash showHidePw"></i>

                    <?php if ($msg === 1): ?>

                        <p class="error">
                            Incorrect password.
                        </p>

                    <?php elseif ($msg === 2): ?>

                        <p class="error">
                            Account does not exist.
                        </p>

                    <?php endif; ?>

                </div>

                <div class="btn">

                    <button type="submit" name="sign">
                        Sign In
                    </button>

                </div>

                <div class="signin-up">

                    <p id="signin-up">
                        Don't have an account?

                        <a href="signup.php">
                            Register
                        </a>
                    </p>

                </div>

            </form>

        </div>

    </div>

    <script src="login.js"></script>

</body>
</html>