<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/DIM.jpg" alt="">
      </div>

      <div class="content">
         <h3>Why choose us?</h3>
         <p>Welcome to Musical Shop, your ultimate online destination for all things musical instruments! Established in 2024, we are passionate about providing musicians of all levels with top-notch instruments, accessories, and exceptional service. Our mission is to inspire creativity, elevate musical experiences, and foster a vibrant community of instruments enthusiasts. At Musical shop  we are committed to offering a carefully curated selection of high-quality instruments that cater to a wide range of playing styles and preferences. Whether you're a seasoned professional or just starting your musical journey, we have the perfect instrument for you. Our team of experienced musicians meticulously inspects and sets up each guitar to ensure it meets the highest standards of playability and tone.</p>
         <a href="contact.php" class="btn">Contact us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
      <img src="images/users.png" alt="">
         <p>Awesome!!!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Abhishek Pudasaini</h3>
      </div>

      <div class="swiper-slide slide">
      <img src="images/users.png" alt="">
         <p>Easy and desirable Guitars</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Amit Podey</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/users.png" alt="">
         <p>Highly Satisfied </p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sushil Gautam</h3>
      </div>

      <div class="swiper-slide slide">
      <img src="images/users.png" alt="">
         <p>Afforedable price</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ichchhit Devkota</h3>
      </div>

      <div class="swiper-slide slide">
      <img src="images/fem.jpg" alt="">
         <p>Comfortable</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sita Tamang</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>