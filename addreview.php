<?php
include_once("header.php");

$result = getUser($_SESSION['username']);
$uss = mysqli_fetch_assoc($result);
$userid = $uss['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST["nama"] ?? '';
  $brand = $_POST["brand"] ?? '';
  $rating = $_POST["rating"] ?? '';

  // Check for image upload
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["foto"]["name"]);
  move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

  // Simple validation
  if (empty($nama) || empty($brand) || empty($rating)) {
    echo "<p>Please fill all required fields.</p>";
  } else {
    $result = addReview($nama, $brand, $userid, $rating, $target_file);
    if ($result) {
      $_SESSION['success_message'] = 'Review added successfully!';
    } else {
      echo "<p>Failed. Please try again.</p>";
    }
  }
}
?>

<section id="chefs" class="chefs section-bg">
  <div class="container mt-5">
    <div class="section-header mt-5">
      <h1 class="mb-3">Add Review</h1>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Product Name:</label>
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"required>
        </div>
        <div class="mb-3">
          <label for="brand" class="form-label">Brand:</label>
          <select class="form-select" id="brand" name="brand">
            <?php
            $brands = getAllBrands();
            if ($brands->num_rows > 0) {
              while ($brand = $brands->fetch_assoc()) {
                echo "<option value=" . $brand['brandid'] . ">" . $brand['brandname'] . "</option>";
              }
            } else {
              echo "No results";
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="rating" class="form-label">Rating:</label>
          <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Insert product picture</label>
          <input type="file" class="form-control" id="foto" name="foto">
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