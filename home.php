<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>606Sneakers | Home</title>

    <!-- font awasome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- css link -->
    <link rel="stylesheet" href="css/syle.css">


</head>
<body>
    
<!-- header mulai -->
<?php include 'components/user_header.php'; ?>
<!-- header selesai -->

<!-- hero mulai -->

<section class="hero">
    <div class="hero-slider">
        <div class="w">
            <div class="slide">
                <div class="content">
                    <span>606 SNEAKERS</span>
                    <h3>Kami menjual sepatu terbaik dan menawarkan jasa joki yang berkualitas.</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="image">
                    <img src="img/hero.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- hero selesai -->

<!-- service mulai  -->
<section class="category">
    <h1 class="title">Service</h1>

    <div class="box-container">
        <div class="box">
            <img src="img/credit-card.png" alt="">
            <h3>SECURE PAYMENT</h3>
        </div>

        <div class="box">
            <img src="img/wallet.png" alt="">
            <h3>MONEY BACK GUARANTEED</h3>
        </div>

        <div class="box">
            <img src="img/badge.png" alt="">
            <h3>AUTHENTICITY 100% GUARANTEED</h3>
        </div>

        <div class="box">
            <img src="img/call-center.png" alt="">
            <h3>24/7 CUSTOMER SERVICE</h3>
        </div>
    </div>
</section>
<!-- service selesai  -->

<!-- about mulai  -->
<section class="about" id="about">
    <div class="about-content">
        <div class="about-text">
            <h2>About Us</h2>
            <p>We are a passionate team dedicated to providing high-quality products and excellent customer service. With years of experience in the industry, we strive to deliver the best solutions for your needs.</p>
        </div>
        <div class="about-image">
            <img src="img/about.jpeg" alt="About Us Image">
        </div>
    </div>
</section>
<!-- about selesai  -->

<!-- product mulai  -->

<section class="products">

   <h1 class="title">OUR PRODUCT</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <!-- <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a> -->
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rp. </span><?= number_format($fetch_products['price'], 0, ',', '.'); ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.html" class="btn">view all</a>
   </div>

</section>


<!-- product selesai  -->








<!-- footer mulai -->
<footer class="footer">
    <div class="credit">
        Created by <span>606 SNEAKERS</span> | all right reserved!
    </div>

</footer>
<!-- footer selesai -->


<!-- js link  -->
<script src="js/script.js"></script>

</body>
</html>