<?php include_once("header.php"); ?>

<?php

$result = getUser($_SESSION['username']);

if ($result) {
    $uss = mysqli_fetch_assoc($result);
    $id = $uss['userid'] ?? null;
} else {
    echo "User not found!";
    exit;
}

?>
<div class="container mt-5">
    <h2 class="mb-3">Your Profile</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Name</th>
                <th>Age</th>
                <th>Skin Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = readUserById($id);
            while ($user = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['password']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['age']; ?></td>
                    <td><?= $user['skintype']; ?></td>
                    <td>
                        <a href="editProfile.php?id=<?= $user['userid']; ?>" class="btn btn-primary">Edit Profile</a>
                        <a href="deleteUser.php?id=<?= $user['userid']; ?>" class="btn btn-danger">Delete Account</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>