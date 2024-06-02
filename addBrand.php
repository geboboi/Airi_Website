<?php include_once("header.php") ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['desc'] ?? '';

    $target_dir = "uploads/";
    $logo = $target_dir . basename($_FILES["logo"]["name"]);
    move_uploaded_file($_FILES["logo"]["tmp_name"], $logo);

    if (empty($logo) || empty($name) || empty($desc)) {
        echo "<p>Please fill all required fields.</p>";
    } else {
        $result = addBrand($logo, $name, $desc);
        if ($result) {
            $_SESSION['success_message'] = 'Brand added successfully!';
          } else {
            echo "<p>Failed. Please try again.</p>";
          }
    }
}

?>

<section id="chefs" class="chefs section-bg">
    <div class="container mt-5">
        <div class="section-header mt-5">
            <h1 class="mb-3">Add Brand</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="logo" class="form-label">Brand Logo: </label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Brand Name: </label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off"required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Brand Description:</label>
                    <input type="text" class="form-control" id="desc" name="desc" autocomplete="off"required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    <?php
    if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) {
        echo 'alert("' . $_SESSION['success_message'] . '");';
        unset($_SESSION['success_message']);
    }
    ?>
});
</script>
<?php include_once("footer.php") ?>