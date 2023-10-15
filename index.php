<?php

include "./fontend_file/header.php";
include "./database/database.php";

// banner section
$bannerquery =" SELECT * FROM banners where status =1 limit 1" ;
$qurey = mysqli_query($connect, $bannerquery);
$fatch = mysqli_fetch_assoc($qurey);

// menu section
$categoryqurey = "SELECT * FROM category";
$sqli = mysqli_query($connect, $categoryqurey);
$categores = mysqli_fetch_all($sqli, 1);

$foodqurey = "SELECT * FROM all_food";
$foodsqli = mysqli_query($connect, $foodqurey);
$foods = mysqli_fetch_all($foodsqli, 1);

//why choice Yammy
$yammy_qurey = "SELECT * FROM `why_yammy` limit 3 ";
$yammy_sqli = mysqli_query($connect, $yammy_qurey);
$yammy_fatchs = mysqli_fetch_all($yammy_sqli, 1);

// About section
$aboutqurey = "SELECT * FROM about where status=1 limit 1 ";
$aboutsqli = mysqli_query($connect, $aboutqurey);
$about = mysqli_fetch_assoc($aboutsqli);

// Counter section
$countqurey = "SELECT * FROM counter";
$countsqli = mysqli_query($connect, $countqurey);
$countfatch = mysqli_fetch_assoc($countsqli);

// Testimonia section
$testimoniaqurey = "SELECT * FROM testimonia";
$tssti_sqli = mysqli_query($connect, $testimoniaqurey);
$tsti_fatchs = mysqli_fetch_all($tssti_sqli, 1);

// Event section
$eventQurey = "SELECT * FROM event";
$eventsqli = mysqli_query($connect, $eventQurey);
$event_fatchs = mysqli_fetch_all($eventsqli, 1);


// chefs section
$chefsqurey = "SELECT * FROM chefs";
$chefs_sqli = mysqli_query($connect, $chefsqurey);
$chefs_fatchs = mysqli_fetch_all($chefs_sqli, 1);

// gallery section
$gallery_qurey = "SELECT * from gallery";
$gallery_sqli = mysqli_query($connect, $gallery_qurey);
$gallery_fatchs = mysqli_fetch_all($gallery_sqli, 1);

// contact section
$contactQurey = "SELECT * FROM contact";
$contactSqli = mysqli_query($connect, $contactQurey);
$contact_fatch = mysqli_fetch_assoc($contactSqli);


?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up"> <?= $fatch['title'] ?> </h2>
          <p data-aos="fade-up" data-aos-delay="100"> <?= $fatch['detail'] ?> </p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="<?=$fatch['cta_link']?>" class="btn-book-a-table"> <?= $fatch['cta_title'] ?> </a>
            <a href=" <?=$fatch['video_link']?> " class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="./uplode_image/banner/<?= $fatch['banner_img'] ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(./uplode_image/about/<?= $about['banner_img'] ?>); background-repeat: no-repeat; background-size: cover;"  data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4> <?= $about['con_name'] ?> </h4>
              <p><?= $about['contract'] ?></p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
              <?= $about['detail'] ?>
              </p>
              
              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid" alt="">
                <a href="<?= $about['video_link'] ?>" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Yummy?</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4">

            <?php
            foreach($yammy_fatchs as $yammy_fatch){
              ?>
                  <div class="col-xl-4" style="height:450px" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4><?=$yammy_fatch['title'] ?></h4>
                  <p><?=$yammy_fatch['detail'] ?></p>
                </div>
              </div><!-- End Icon Box -->
              <?php
            }
            
            ?>
             

      

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?= $countfatch['num_a'] ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><?= $countfatch['title_a'] ?></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?= $countfatch['num_b'] ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><?= $countfatch['title_b'] ?></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?= $countfatch['num_c'] ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><?= $countfatch['title_c'] ?></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?= $countfatch['num_d']?> " data-purecounter-duration="1" class="purecounter"></span>
              <p><?= $countfatch['title_d'] ?></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <?php
        foreach($categores as $key=>$categore){
          ?>
          <li class="nav-item">
          <a class="nav-link <?= $key == 0 ? "active show" : "" ?> " data-bs-toggle="tab" data-bs-target="#menu-<?=  str_replace(" ", "_", $categore['title'] ) ?>">
            <h4><?=ucfirst($categore['title']) ?></h4>
          </a>
        </li>
        <?php
        }
        
        ?>
         <!-- End tab nav item -->

         

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">


        <?php
        foreach($categores as $key=>$categore){
          ?>
          <div class="tab-pane fade <?= $key==0? "active show":"" ?>" id="menu-<?=  str_replace(" ", "_", $categore['title'] ) ?>">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3><?= $categore['title'] ?></h3>
          </div>

          <div class="row gy-5">

          <?php
          foreach($foods as $food){
            if($food['category_id']== $categore['id']){
            ?>
            <div class="col-lg-4 menu-item">
              <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="./uplode_image/food/<?= $food['food_img'] ?>" class="menu-img img-fluid" alt=""></a>
              <h4><?= $food['title'] ?></h4>
              <p class="ingredients">
              <?= $food['detail'] ?>
              </p>
              <p class="price">
                $<?= $food['price'] ?>
              </p>
            </div><!-- Menu Item -->

            <?php
            }
          }
          
          ?>
            

            

          </div>
        </div><!-- End Starter Menu Content -->
        <?php
        }
        
        ?>
          

          

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <p>What Are They <span>Saying About Us</span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">


          <?php
          foreach($tsti_fatchs as $tsti_fatch){
            ?>
            <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="row gy-4 justify-content-center">
                <div class="col-lg-6">
                  <div class="testimonial-content">
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <?= $tsti_fatch['detail']?>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3><?= $tsti_fatch['name']?></h3>
                    <h4><?= $tsti_fatch['owner']?></h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 text-center">
                  <img src="./uplode_image/Tesimonia/<?=$tsti_fatch['image']?>" class="img-fluid testimonial-img" alt="">
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->
         


            <?php
          }
          ?>
 
            

          

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Events</h2>
          <p>Share <span>Your Moments</span> In Our Restaurant</p>
        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

          <?php
          foreach($event_fatchs as $event_fatch){
            ?>
            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(./uplode_image/Event/<?=$event_fatch['banner_img']?>)">
            <h3><?=$event_fatch['name']?></h3>
            <div class="price align-self-start">$<?=$event_fatch['price']?></div>
            <p class="description">
            <?=$event_fatch['detail']?>
            </p>
          </div><!-- End Event item -->
          <?php
          }
          
          ?>
           

           

            

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Chefs</h2>
          <p>Our <span>Proffesional</span> Chefs</p>
        </div>

        <div class="row gy-4">

        <?php
        foreach($chefs_fatchs as $chefs_fatch){
          ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="chef-member">
              <div class="member-img">
                <img src="./uplode_image/Chefs/<?=$chefs_fatch['image']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?=$chefs_fatch['name']?></h4>
                <span><?=$chefs_fatch['owner']?></span>
                <p><?=$chefs_fatch['detail']?>.</p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
          <?php
        }
        ?>

          

          

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Book A Table</h2>
          <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class=" col-lg-8 d-flex align-items-center reservation-form-bg">

            <form action="./login_control/book_table.php" method="post"  data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4 m-3">
                <div class="col-lg-4 col-md-6">
                  
                  <input type="text" name="name" class="form-control rounded-0" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control rounded-0" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="date" class="form-control rounded-0" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control rounded-0" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control rounded-0" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars" required>
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group m-4 ">
                <textarea class="form-control rounded-0" name="message" rows="5" id="exampleFormControlTextarea1" placeholder="Message"></textarea>
                <div class="validate"></div>
                
              </div>
    
              
              <div class="text-center  mt-5"><button class="btn btn-danger ">Submit</button></div>
            </form>
            
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">

          <div class="swiper-wrapper align-items-center">


          <?php
          foreach($gallery_fatchs as $gallery_fatch){
            ?>
           <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="./uplode_image/Gallery/<?=  $gallery_fatch['image'] ?>"><img  src="./uplode_image/Gallery/<?=  $gallery_fatch['image'] ?>" class="img-fluid" alt=""></a></div>

<?php
          }
          
          ?>

            
           


          </div>

          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="<?= $contact_fatch['map'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3 >Our Address</h3>
                <p class="col-lg-6"><?= $contact_fatch['address'] ?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p class="col-lg-8"><?= $contact_fatch['email'] ?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p class="col-lg-8"><?= $contact_fatch['coll'] ?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <h6 class="col-lg-8"><?= $contact_fatch['opening'] ?></h6>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="./login_control/book_table.php" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->





 <?php
 include "./fontend_file/footer.php"
 ?>