<?php

function connectDB()
{
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db = "airi";

    $conn = mysqli_connect($host, $user, $pass, $db) or die("ERROR CONNECT TO DATABASE");
    return $conn;
}
function closeDB($conn)
{
    mysqli_close($conn);
}

function getAllBrands()
{
    $conn = connectDB();
    $sql = "SELECT * FROM brands";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function deleteReview($reviewid)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "DELETE FROM reviews WHERE reviewid = $reviewid";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function createUser($uname, $pass, $email, $name, $age, $skin)
{
    $validSkinTypes = array('Dry', 'Oily', 'Combination', 'Normal', 'Sensitive');
    if (!in_array($skin, $validSkinTypes)) {
        echo "Invalid skintype provided.";
        return false;
    }
    $conn = connectDB();
    if ($conn) {
        $sql = "INSERT INTO users (`userid`, `username`, `password`, `email`, `name`, `age`, `skintype`) VALUES (NULL,'$uname','$pass','$email','$name','$age', '$skin')";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function getUser($username)
{
    $conn = connectDB();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    closeDB($conn);
    return $result;
}

function addReview($nama, $brand, $user, $rating, $target_file)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "INSERT INTO reviews (`reviewid`, `productname`, `brandid`, `userid`, `rating`, `photo`) VALUES (NULL,'$nama','$brand', '$user', '$rating','$target_file')";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function updateReview($reviewid, $nama, $brand, $rating, $target_file)
{
    $conn = connectDB();
    if ($conn) {
        // Asumsikan `reviewid` merupakan primary key dalam tabel reviews
        $sql = "UPDATE reviews SET productname='$nama', brandid='$brand', rating='$rating', photo='$target_file' WHERE reviewid='$reviewid'";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}


function getAllReviews()
{
    $conn = connectDB();
    $sql = "SELECT reviews.reviewid, reviews.productname, brands.brandname, reviews.rating, reviews.photo, reviews.postdate
    FROM reviews
    INNER JOIN brands ON reviews.brandid = brands.brandid";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function yourReviews($id)
{
    $conn = connectDB();
    $sql = "SELECT * FROM reviews WHERE userid = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getReviewsById($id)
{
    $conn = connectDB();
    $sql = "SELECT * FROM reviews WHERE reviewid = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function readUserById($id)
{
    $conn = connectDB();
    $sql = "SELECT * FROM users WHERE userid = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function deleteUser($id)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "DELETE FROM users WHERE userid = '$id'";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function updateProfile($userid, $username, $password, $email, $name, $age, $skintype)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "UPDATE users SET username='$username', password='$password', email='$email', name='$name', age='$age', skintype='$skintype' WHERE userid='$userid' ";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function addBrand($logo, $name, $desc)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "INSERT INTO brands (`brandid`, `brandlogo`, `brandname`, `description`) VALUES (NULL,'$logo','$name','$desc')";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function getBrandById($id)
{
    $conn = connectDB();
    $sql = "SELECT * FROM brands WHERE brandid = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function editBrand($id, $logo, $name, $desc)
{
    $conn = connectDB();
    if ($conn) {
        $sql = "UPDATE brands SET brandlogo='$logo', brandname='$name', description='$desc' WHERE brandid='$id'";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}

function deleteBrand($id){
    $conn = connectDB();
    if ($conn) {
        $sql = "DELETE FROM brands WHERE brandid = $id";
        $result = mysqli_query($conn, $sql);
        closeDB($conn);
        return $result;
    } else {
        echo "Connection to database failed.";
        return false;
    }
}
