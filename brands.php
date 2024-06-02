<?php include_once("header.php"); ?>

<?php
$result = getUser($_SESSION['username']);
$uss = mysqli_fetch_assoc($result);
$role = $uss['role'];

?>
<section id="testimonials" class="testimonials section-bg">
    <div class="container mt-5" data-aos="fade-up">
        <div class="section-header">
            <p>Brands</p>
        </div>
        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php
                $brands = getAllBrands();
                while ($brand = $brands->fetch_assoc()) { ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <?= $brand['description']; ?>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3><?= $brand['brandname']; ?></h3>
                                        <?php
                                        if ($role === 'admin') {
                                        ?>
                                            <a href="editBrand.php?id=<?= $brand['brandid']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="deleteBrand.php?id=<?= $brand['brandid']; ?>" class="btn btn-danger">Delete</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="<?= $brand['brandlogo']; ?>" class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div><!-- End testimonial item -->
        </div>
        <?php
        if ($role === 'admin') {
        ?>
            <div class="d-flex justify-content-center">
                <a href="addBrand.php" class="btn btn-danger">Add Brand</a>
            </div>
        <?php
        }
        ?>
        <div class="swiper-pagination"></div>
    </div>
</section>


<?php include_once("footer.php") ?>