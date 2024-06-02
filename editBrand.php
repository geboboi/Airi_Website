<?php include_once("header.php") ?>

<?php
$id = $_GET['id'];
$result = getBrandById($id);
$data = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandid = $data["brandid"] ?? '';
    $nama = $_POST["nama"] ?? '';
    $desc = $_POST["desc"] ?? '';

    // Check for image upload
    $target_dir = "uploads/";
    $logo = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $logo);

    // Simple validation
    if (empty($nama) || empty($desc) || empty($logo)) {
        echo "<p>Please fill all required fields.</p>";
    } else {
        $result = editBrand($brandid, $logo, $nama, $desc);
        if ($result) {
            $_SESSION['success_message'] = 'Brand edited successfully!';
        } else {
            echo "<p>Failed. Please try again.</p>";
        }
    }
}

?>

<section id="chefs" class="chefs section-bg">
    <div class="container mt-5">
        <div class="section-header mt-5">
            <h1 class="mb-3">Edit Brand</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label">Brand Logo:</label>
                    <input type="file" id="foto" name="foto" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Brand Name:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $data['brandname'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Brand Description:</label>
                    <input type="text" id="desc" name="desc" class="form-control" value="<?= $data['description'] ?>" required>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Submit" class="btn btn-primary">
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