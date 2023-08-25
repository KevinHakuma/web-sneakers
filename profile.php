<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

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

<!-- heading mulai  -->
<div class="heading">
    <h3>profile detail</h3>
    <p><a href="index.html">home </a><span> / profile</span></p>
</div>

<!-- heading selesai  -->

<!-- profile mulai  -->
<section class="user-details">
    <div class="user">
    <?php
         
         ?>
         <img src="img/user-icon.png" alt="">
         <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['name']; ?></span></span></p>
         <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
         <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
         <a href="update_profile.php" class="btn">update info</a>
         <p class="address"><i class="fas fa-map-marker-alt"></i><span><?php if($fetch_profile['address'] == ''){echo 'please enter your address';}else{echo $fetch_profile['address'];} ?></span></p>
         <a href="update_address.php" class="btn">update address</a>
      </div>
    </div>
</section>

<!-- profile selesai  -->




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