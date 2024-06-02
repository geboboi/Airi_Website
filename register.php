<?php
require("controller.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $skin = $_POST['skintype'];

    $result = createUser($uname, $password, $email, $name, $age, $skin);
    if ($result) {
        echo "<div class='alert alert-success' role='alert'>User created successfully!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-4 mb-3">Register to Join The Team!</h2>
    <form method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Age" name="age">
        </div>
        <div class="form-group">
            <select class="form-control" name="skintype" required>
                <option value="">Select Skin Type</option>
                <option value="Dry">Dry</option>
                <option value="Oily">Oily</option>
                <option value="Combination">Combination</option>
                <option value="Normal">Normal</option>
                <option value="Sensitive">Sensitive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="login.php" class="btn btn-warning">Back</a>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
