<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   } else {
      $message[] = 'incorrect password or email!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- <style>
      #crd {
         margin-left: 200px;
      }
   </style> -->

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

<div class="row">
   <div class="col-lg-6 col-md-12">
      <div class="form-container">
         <form action="" method="post">
            <h3>login now</h3>
            <input type="email" name="email" required placeholder="enter email" class="box">
            <input type="password" name="password" required placeholder="enter password" class="box">
            <input type="submit" name="submit" class="btn" value="login now">
            <p>don't have an account? <a href="register.php">register now</a></p>
         </form>
      </div>
   </div>
   <div class="col-lg-6 col-md-12" style="text-align: center;">
      <div class="card d-flex flex-column align-items-center justify-content-center border border-dark" style="width: 100%; height: 40vh;">
         <div class="card-header">
            <h3>Continue as a Guest</h3>
         </div>
         <form class="card-body">
            <a href="\jlpods\shoppingcart\index.php" class="btn btn-primary btn-sm d-flex justify-content-center mt-3">
               Guest
            </a>
         </form>
      </div>
   </div>
</div>

<!-- <script>
   // Save HTML code to local storage
   const htmlCode = document.querySelector('.row').outerHTML;
   localStorage.setItem('savedHtmlCode', htmlCode);

   // Retrieve HTML code from local storage
   const savedHtmlCode = localStorage.getItem('savedHtmlCode');
   if (savedHtmlCode) {
      document.querySelector('.row').outerHTML = savedHtmlCode;
   }
</script> -->








</body>

</html>