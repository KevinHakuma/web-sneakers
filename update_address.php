<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

    $address = $_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .' - '. $_POST['pin_code'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'address saved!';

}

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
<?php include 'components/user_header.php' ?>
<!-- header selesai -->

<!-- heading mulai  -->
<div class="heading">
    <h3>update address</h3>
    <p><a href="index.html">home </a><span> / update address</span></p>
</div>

<!-- heading selesai  -->

<section class="form-container">

   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" class="box" placeholder="alamat" required maxlength="50" name="area">
      <input type="text" class="box" placeholder="kecamatan" required maxlength="50" name="town">
      <input type="text" class="box" placeholder="kota" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="provinsi" required maxlength="50" name="state">
      <!-- <input type="text" class="box" placeholder="country name" required maxlength="50" name="country"> -->
      <input type="number" class="box" placeholder="kode pos" required max="999999" min="0" maxlength="6" name="pin_code">
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>




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