<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container px-5 pt-3">
        <?php
        @$err = $_GET['err'];
        if ($err == "logout") { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Log out successful!</strong> Thank you for using Airi.
            </div>
        <?php
        } else if ($err == "wrong") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Log in failed!</strong> Invalid username or password.
        </div>
        <?php
        }
        ?>
        <h2 class="pt-3">Please Login!</h2>
        <form action="loginaction.php" method="post">
            <div class="form-group">
                <label for="username" class="form-label">Username: </label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p class="mt-3">New user? <a href="register.php">Register here</a>.</p>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>