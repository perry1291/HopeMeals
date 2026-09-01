<?php
// session_start();
// include 'connection.php';

// if (isset($_POST['feedback'])) {
//   $email = $_POST['email'];
//   $name = $_POST['name'];
//   $msg = $_POST['message'];
//   $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
//   $sanitized_name =  mysqli_real_escape_string($connection, $name);
//   $sanitized_msg =  mysqli_real_escape_string($connection, $msg);
//   $query="insert into user_feedback(name,email,message) values('$sanitized_name','$sanitized_emailid','$sanitized_msg')";
//   $query_run= mysqli_query($connection, $query);
//   if($query_run)
//   {
//       echo '<script>alert("data saved")</script>';
//       header("location:contact.html");
     
//   }
//   else{
//       echo '<script>alert("data not saved")</script>'; 
//   }

// }


session_start();
include 'connection.php'; // assumes $connection is defined inside this file

if (isset($_POST['feedback'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $msg = trim($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.'); window.history.back();</script>";
        exit();
    }

    // Prepare statement to prevent SQL injection
    $stmt = mysqli_prepare($connection, "INSERT INTO user_feedback (name, email, message) VALUES (?, ?, ?)");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "<script>alert('Your feedback has been sent successfully!'); window.location.href='contact.html';</script>";
        exit();
    } else {
        echo "<script>alert('Failed to send feedback. Please try again later.'); window.history.back();</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid form submission'); window.history.back();</script>";
}



?>
