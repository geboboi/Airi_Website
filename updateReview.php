<?php include_once("header.php") ?>

<?php
$id = $_GET['id'];
$result = getReviewsById($id);
$data = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reviewid = $data["reviewid"] ?? '';
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
    $result = updateReview($reviewid, $nama, $brand, $rating, $target_file);
    if ($result) {
      echo "<p>Review edited successfully!</p>";
    } else {
      echo "<p>Faild. Please try again.</p>";
    }
  }
}

?>



<section id="chefs" class="chefs section-bg">
  <div class="container mt-5">
    <div class="section-header mt-5">
      <<h1 class="mb-3">Edit Review</h1>
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk:</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?= $data['productname'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="brand" class="form-label">Pilih Nama:</label>
            <select id="brand" name="brand" class="form-select">
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
            <label for="rating" class="form-label">Rating :</label>
            <input type="number" id="rating" name="rating" min="1" max="5" class="form-control" value="<?= $data['rating'] ?>">
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto :</label>
            <input type="file" id="foto" name="foto" class="form-control">
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Submit">
          </div>
        </form>
    </div>
  </div>
</section>
<?php include_once("footer.php") ?>