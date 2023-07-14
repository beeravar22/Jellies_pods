<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($select_cart) > 0) {
      $message[] = 'product already added to cart!';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }
};

if (isset($_POST['update_cart'])) {
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}

if (isset($_GET['delete_all'])) {
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      body {
         background-color: white;
      }

      /* .conainer {

         position: relative;
      }

      .products {
         position: absolute;
         margin-left: 30px;
      }

      .shopping-cart {
         position: absolute;
         margin-top: 0;
         margin-left: 50%;

      } */

      .navbar-brand{
            margin-left: 20px;
        }

      body {
         padding-left: 40px;
         padding-right: 40px;
      }

      .option-btn {
         /* CSS rules for the option-btn class */
         background-color: black;
         color: white;
         /* padding: 10px; */
         border: none;
         cursor: pointer;
      }

      .spl {
         margin-top: 20px;
      }

      #spl {
         margin-top: 20px;
      }

      /* .navbar {
         margin-left: 80px;
         margin-right: 80px;
      } */
      /* .form{
         position: relative;
      }
      .formcon{
         position: absolute;
         margin-left: 50%;
      } */
   </style>


   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



   <!-- font styles -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500&family=Marcellus&family=Maven+Pro&display=swap" rel="stylesheet">


   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500&family=Gilda+Display&family=Marcellus&family=Maven+Pro&display=swap" rel="stylesheet">


   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">










   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>






<section id="title">

<div class="container1">



    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="" style="color:black; font-size: larger;;">J e l l i e s - A I</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto" style="padding-left: 40px;">

                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Support
                        </button>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href=" " style="color:black;">About Us</a>
                </li>



                <li class="nav-item ps-3">
                    <a href="\jlpods\index.html">
                    <i class="fa-solid fa-house"></i></a>
                </li>

                <!-- <li class="nav-item ps-3">
                    <i class="fa fa-cart-arrow-down " aria-hidden="true"></i>
                </li> -->

                <!-- <li class="nav-item ps-3">
                    <a href="shoppingcart1/shoppingcart/login.php">
                    
                    <i class="fa fa-user-circle " aria-hidden="true"></i></a>
                </li> -->



            </ul>
        </div>


    </nav>
</div>
</section>
   <hr>
   <div class="bag">
      <h1 style="text-align: center;">
         <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if (mysqli_num_rows($cart_query) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
         ?>
               <!-- <div class="spl">$<?php echo $fetch_cart['price']; ?>/-</div> -->
               <div class="spl">Yor Bag total is..<?php echo $sub_total = (floatval($fetch_cart['price']) * intval($fetch_cart['quantity'])); ?>/-</div>
         <?php
               $grand_total += $sub_total;
               $_SESSION['grand_total'] = $grand_total;
            }
         } else {
            echo '<div style="padding:0px; text-transform:capitalize;">your bag is empty</div>';
         }
         ?>

      </h1>
   </div>
   <hr>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

   <div class="container">
      <div class="row">
         <div class="col-lg-12 products">
            <div class="box-container">
               <?php
               $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
               if (mysqli_num_rows($select_product) > 0) {
                  while ($fetch_product = mysqli_fetch_assoc($select_product)) {
               ?>
                     <form method="post" class="" action="goin.php" style="padding-left: 40px;
    padding-right: 40px;">
                        <img src="images/<?php echo $fetch_product['image']; ?>" alt="" onsubmit="redirectToPage(event, 'goin.php')">
                        <div class="name" style="padding-left: 20px;"><?php echo $fetch_product['name']; ?></div>
                        <div class="price" style="padding-left: 20px;">$<?php echo $fetch_product['price']; ?>/-</div>
                        <input type="number" min="1" name="product_quantity" value="1" style="border: 1px solid black;margin-left: 20px;display: none;" class="form-control" readonly="readonly" >
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-primary" style="margin-left: 20px;" id="my">

                     </form>
                     

                     <script>
                        function redirectToPage(event, destinationURL) {
                           event.preventDefault(); // Prevent the form from submitting normally

                           // Redirect the user to the destination URL
                           window.location.href = destinationURL;
                        }
                     </script>






               <?php
                  }
               }
               ?>
            </div>
         </div>

      </div>
   </div>
   <div class="push" style="margin-top: 50px;">


      <h1 style="text-align: center;">
         Prodcut Specification
      </h1>


      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="prd" style="text-align: center;margin-top: 40px;">
                  <h3>Overview</h3>
                  <div class="prddsp" style="margin-top: 40px;">
                     <h5>Rebuilt from the sound up</h5>
                     <p>
                        AirPods Pro (2nd generation) have been reengineered to deliver up to 2x more Active Noise Cancellation. Adaptive Transparency reduces external noise, while Personalized Spatial Audio immerses you in sound. A single charge delivers up to 6 hours of battery life.⁷ And Touch control lets you easily adjust volume with a swipe. The revamped MagSafe Charging Case is a marvel on its own with Precision Finding¹⁵, built-in speaker, and lanyard loop.
                     </p>
                     <h3 style="margin-top: 40px;">Superior audio quality</h3>
                     <p>
                        The upgraded H2 chip powers smarter noise cancellation and three-dimensional sound. Adaptive EQ tunes music to your ears in real time to deliver crisp, clean high notes and deep, rich bass in stunning clarity.
                     </p>
                     <h3 style="margin-top: 40px;">Up to 2x more noise cancellation</h3>
                     <p>
                        Active Noise Cancellation now cancels twice as much unwanted noise, so nothing interrupts your listening during a commute and when you need to focus.¹ And Adaptive Transparency reduces and adjusts down the intensity of loud noises at 48,000 times per second, so you can comfortably stay connected to the world around you in any setting.
                     </p>
                     <h3 style="margin-top: 40px;">Personalized listening</h3>
                     <p>
                        A listening experience all your own. Pick from four sizes of flexible silicone ear tips (XS, S, M, L) for an ideal acoustic seal and fit. Personalized Spatial Audio with dynamic head tracking tailors the listening experience by precisely placing sound elements in the space around you.º Adaptive EQ tunes music to your ears, so you hear consistently detailed playback, every time.
                     </p>
                     <h3 style="margin-top: 40px;">Expanded battery life</h3>
                     <p>
                        Now you can enjoy up to 6 hours of listening time on a single charge, and up to 30 hours of listening time with the MagSafe Charging Case. ººº Recharge the MagSafe Charging Case with an Apple Watch or MagSafe charger. You can also use the Lightning connector or a Qi-certified charger.
                     </p>
                     <h3 style="margin-top: 40px;">Redesigned charging case</h3>
                     <p>
                        The reengineered MagSafe Charging Case includes the U1 chip with Precision Finding¹⁵ to help you identify the location of your case. And if you’re nearby and it’s tucked away you can play sounds from the built-in speaker. A built-in lanyard loop˄ lets you attach your case to a backpack or handbag, so it’s always within reach. And both AirPods Pro and the MagSafe Charging Case are built to brave the elements, with IPX4 sweat and water resistance.
                     </p>
                  </div>
               </div>
            </div>


            <div class="col-lg-12">
               <div class="prd" style="margin-top: 60px;">
                  <h3>
                     <hr>Highlights
                  </h3>
                  <div class="prddsp">
                     <ul>
                        <li>Designed by Apple</li>
                        <li>H2 Apple Silicon, amazing sound quality with Adaptive EQ</li>
                        <li>Personalized Spatial Audio with dynamic head trackingº</li>
                        <li>Active Noise Cancellation</li>
                        <li>Four silicone ear tip sizes for a more customizable fit and seal</li>
                        <li>Adaptive Transparency</li>
                        <li>Touch control lets you adjust volume with a swipe and manage playback functions from the stem</li>
                        <li>MagSafe Charging Case with Precision Finding¹⁵, built-in speaker, and lanyard loop˄</li>
                        <li>Up to 6 hours of listening time with Active Noise Cancellation enabled.⁷ Up to 30 hours of total listening time with Active Noise Cancellation enabled, using the case.¹⁰</li>
                        <li>AirPods Pro and charging case are sweat and water resistant (IPX4)²</li>
                        <li>Automatically on, automatically connected</li>
                        <li>Easy setup for all your Apple devices⁵</li>
                        <li>Case can be charged either wirelessly using a MagSafe charger, an Apple Watch charger, or a Qi-certified charger, or with the Lightning connector</li>
                     </ul>
                  </div>
               </div>
            </div>


            <div class="col-lg-12">
               <div class="prd" style="margin-top: 60px;">
                  <h3>
                     <hr>What’s in the Box
                  </h3>
                  <div class="prddsp">
                     <ul>
                        <li>AirPods Pro</li>
                        <li>MagSafe Charging Case with speaker and lanyard loop˄</li>
                        <li>Silicone ear tips (four sizes: XS, S, M, L)</li>
                        <li>Lightning to USB-C Cable</li>
                        <li>Documentation</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <hr>


      <div class="row" style="opacity:0.6; text-align:center;  margin-top:80px; text-align: center;">



         <div class="card" style="width: 22rem;">
            <div class="card-body">
               <h5 class="card-title">Shop</h5>

               <p class="card-text">


                  Cancellation & Return Policy <br>
                  Track Order Status<br>
                  Welcome Voucher<br>
                  Samsung Referral Advantage<br>
                  Samsung Student Advantage<br>
                  Defence Purchase Program<br>
                  Corporate Employee Program<br>
                  Corporate Bulk Purchase<br>
                  Samsung Experience Store<br>
                  Store Locator<br>
                  Smart Club<br>
                  FAQs<br>
                  Terms of Use<br>
                  Grievance Redressal<br>
                  Explore<br> </p>
            </div>
         </div>

         <div class="card" style="width: 22rem;">
            <div class="card-body">
               <h5 class="card-title">Support</h5>
               <p class="card-text"> <br>
                  WhatsApp Us (हिंदी/ English) <br>
                  Sign Language <br>
                  Email Us <br>
                  Call Us <br>
                  Email the CEO <br>
                  Community <br>
                  Product Registration <br>
                  Service Centre <br>
                  Share Your Opinion</p> <br>
            </div>
         </div>


         <div class="card" style="width: 22rem;">
            <div class="card-body">
               <h5 class="card-title">Account & Community</h5>
               <p class="card-text">Account & Community
                  My Page <br>
                  My Products<br>
                  Orders<br>
                  Wishlist<br>
                  Vouchers<br>
                  My Referrals<br>
                  Service<br>
                  Communityp><br>
            </div>
         </div>


         <!-- <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Sustainability</h5>
        <p class="card-text"> 
            Environment                      <br>
            Security & Privacy<br>
            Accessibility<br>
            Diversity · Equity · Inclusion<br>
            Corporate Citizenship<br>
            Corporate Sustainability<br>
        </p>
    </div>
</div> -->


      </div>


</body>

</html>