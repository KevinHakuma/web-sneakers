<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      
      // Check user_type to determine where to redirect
      if ($row['user_type'] === 'admin') {
         header('location:admin/dashboard.php');
      } elseif ($row['user_type'] === 'user') {
         header('location:home.php');
      } else {
         // Handle other user types or errors
      }
      
   }else{
      $message[] = 'incorrect username or password!';
   }
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
<?php include 'components/user_header.php'; ?>
<!-- header selesai -->

<!-- login mulai  -->
<section class="form-container">
    <form action="" method="post">
        <h3>login now</h3>
        <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')">
        <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g,'')">
        <input type="submit" class="btn" name="submit" value="login now">
        <p>don't have an account? <a href="register.php">register now</a></p>
    </form>
</section>

<!-- login selesai  -->





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