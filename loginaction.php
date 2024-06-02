<?php
require("controller.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = connectDB();
    $user = getUser($username);
    $u = mysqli_fetch_assoc($user);
    $passnew = password_verify($password, $u['password']);
    var_dump($passnew);
    if ($user && $passnew) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php"); // redirect to user dashboard
        exit();
    } else {
        header("Location: login.php?err=wrong"); // redirect to user dashboard
        exit();
    }
}
?>