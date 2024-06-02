<?php
include_once("header.php");
$result = getUser($_SESSION['username']);

if ($result) {
    $uss = mysqli_fetch_assoc($result);
    $id = $uss['userid'];
} else {
    echo "User not found!";
    exit;
}
?>
<section id="chefs" class="chefs section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header mt-5">
            <p>My <span>Reviews</span></p>
        </div>
        <div class="row gy-4">
            <?php
            $reviews = yourReviews($id);
            while ($review = $reviews->fetch_assoc()) { 
                $rating = $review['rating']; ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mx-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="chef-member">
                        <div class="member-img">
                            <a href="<?= $review['photo']; ?>" class="glightbox"><img src="<?= $review['photo']; ?>" class="img-fluid" alt=""></a>
                        </div>
                        <div class="member-info">
                            <h4><?= $review['productname']; ?></h4>
                            <span><?php
                                    if ($rating == 1) { ?>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                <?php } else if ($rating == 2) { ?>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                <?php  } else if ($rating == 3) { ?>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                <?php } else if ($rating == 4) { ?>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                <?php } else if ($rating == 5) { ?>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                    </div>
                                <?php  }
                                ?>
                            </span>
                            <p><?= $review['postdate']; ?></p>
                            <div class="btn-book-a-table">
                            <a href="updateReview.php?id=<?= $review['reviewid']; ?>"><button class="btn btn-primary">Edit</button></a>
                            <a href="deleteReview.php?id=<?= $review['reviewid']; ?>"><button class="btn btn-danger">Delete</button></a>
                        </div>
                    </div>
                </div><!-- End Chefs Member -->
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include_once("footer.php"); ?>