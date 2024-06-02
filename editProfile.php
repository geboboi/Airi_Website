<?php include_once("header.php") ?>

<?php
$id = $_GET['id'];
$result = readUserById($id);
$data = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userid = $data["userid"] ?? '';
  $uname = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $skin = $_POST['skintype'];

  // Simple validation
  if (empty($uname) || empty($password) || empty($email)) {
    echo "<p>Please fill all required fields.</p>";
  } else {
    $result = updateProfile($userid, $uname, $password, $email, $name, $age, $skin);
    if ($result) {
      $_SESSION['success_message'] = 'Profile edited successfully!';
      $result = readUserById($userid);
      if ($result) {
        $data = mysqli_fetch_assoc($result);
      } else {
        echo "<p>Error reading updated user data.</p>";
      }
    } else {
      echo "<p>Failed. Please try again.</p>";
    }
  }
}

?>



<section id="chefs" class="chefs section-bg">
  <div class="container mt-5">
    <div class="section-header mt-5">
      <h1 class="mb-3">Edit Your Profile</h1>
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" id="username" name="username" class="form-control" value="<?= $data['username'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" name="password" class="form-control" value="<?= $data['password'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" id="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" id="name" name="name" class="form-control" value="<?= $data['name'] ?>" required>
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">Age:</label>
          <input type="number" id="age" name="age" class="form-control" value="<?= $data['age'] ?>">
        </div>
        <div class="mb-3">
          <label for="skintype" class="form-label">Skin Type:</label>
          <select name="skintype" id="skintype" class="form-select">
            <option value="">Select Skin Type</option>
            <option value="Dry">Dry</option>
            <option value="Oily">Oily</option>
            <option value="Combination">Combination</option>
            <option value="Normal">Normal</option>
            <option value="Sensitive">Sensitive</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="submit" value="Edit" class="btn btn-primary">
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