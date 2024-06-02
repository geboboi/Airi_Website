<?php
include_once("header.php");

$result = getUser($_SESSION['username']);
$uss = mysqli_fetch_assoc($result);
$id = $uss['userid'];

?>
<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Your Everyday<br>Makeup Ally</h2>
          <p data-aos="fade-up" data-aos-delay="100">Whether you're a makeup enthusiast or just starting your beauty journey, Airi is here to be your trusted companion, empowering you to express your individuality and embrace your unique beauty, effortlessly. <br><br><br>
          Join us today and experience the difference of having Airi by your side!</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="addreview.php" class="btn-book-a-table">Write a Review</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/makeup.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section>
<section id="menu" class="menu">
    <div class="section-header">
        <p>Check The Newest <span>Reviews</span></p>
    </div>
    <div id="div1" style="display:none;">
        <<div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            <div class="tab-pane fade active show" id="menu-starters">

                <div class="row gy-5">
                    <?php
                    $reviews = getAllReviews();

                    while ($review = $reviews->fetch_assoc()) {
                        $rating = $review['rating']; ?>
                        <div class="col-lg-4 menu-item">
                            <a href="<?= $review['photo']; ?>" class="glightbox"><img src="<?= $review['photo']; ?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?= $review['productname']; ?></h4>
                            <p class="ingredients">
                                <?= $review['brandname']; ?>
                            </p>
                            <p class="rating">
                                <?php
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
                        </p>
                        <p></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#div1").fadeIn(2000);
    });
</script>
<?php include_once("footer.php"); ?>