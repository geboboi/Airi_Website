<?php 
include_once("controller.php");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(empty($id)) {
        echo "<p>Please fill all required fields.</p>";
    } else {
        $result = deleteBrand($id);

        if ($result) {
            
            echo "<script type='text/javascript'>
                  alert('Brand deleted.');
                  window.location='brands.php';
              </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Failed to delete!');
        window.location='brands.php';
    </script>";
    }
    }
} ?>
