<?php include_once("controller.php") ?>
<?php if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (empty($id)) {
        echo "<p>Please fill all required fields.</p>";
    } else {
        $result = deleteUser($id);
        if ($result) {
            unset($_SESSION['username']);
            session_destroy();
            echo "<script type='text/javascript'>
                  alert('User deleted.');
                  window.location='login.php';
              </script>";
        } else {
            echo "<script type='text/javascript'>
        alert('Failed to delete!');
        window.location='index.php';
    </script>";
        }
    }
} ?>
