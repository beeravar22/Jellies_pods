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

        body {
            padding-left: 40px;
            padding-right: 40px;
        }
        .navbar-brand{
            margin-left: 20px;
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
            <div class="col-lg-6 col-sm-12 products">
                <div class="box-container">
                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                    if (mysqli_num_rows($select_product) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                    ?>
                            <!-- <form method="post" class="" action="" style="padding-left: 40px;padding-right: 40px;">
                                <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
                                <div class="name" style="padding-left: 20px;"><?php echo $fetch_product['name']; ?></div>
                                <div class="price" style="padding-left: 20px;">$<?php echo $fetch_product['price']; ?>/-</div>
                                <input type="number" min="1" name="product_quantity" value="1" style="border: 1px solid black;margin-left: 20px;" class="form-control">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="submit" value="Add to Cart" name="add_to_cart" class="btn btn-primary" style="margin-left: 20px;">
                                <a href="goin.php">shoppingcart</a>
                            </form> -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-12 shopping-cart">
                <h1 class="heading">Shopping Cart</h1>
                <div>
                    <?php
                    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                    $grand_total = 0;
                    if (mysqli_num_rows($cart_query) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                    ?>
                            <div class="spl">
                                <!-- <img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""> -->
                                <div class="spl"><?php echo $fetch_cart['name']; ?></div>
                                <div class="spl">$<?php echo $fetch_cart['price']; ?>/-</div>
                                <div class="spl">
                                    <form action="" method="post">
                                        <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                        <!-- <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?> " style="border: 1px solid black; width:50%;" class="form-control"> -->
                                        <?php
                                        // Assuming $fetch_cart['quantity'] contains the initial quantity value
                                        $updatedQuantity = isset($_POST['cart_quantity']) ? $_POST['cart_quantity'] : $fetch_cart['quantity'];
                                        ?>

                                        <input type="number" min="1" name="cart_quantity" value="<?php echo $updatedQuantity; ?>" style="border: 1px solid black; width:50%;" class="form-control">

                                        <input type="submit" name="update_cart" value="Update" class="btn btn-primary">
                                    </form>
                                </div>
                                <div class="spl">$<?php echo $sub_total = (floatval($fetch_cart['price']) * intval($fetch_cart['quantity'])); ?>/-</div>

                                <div class="spl"><a href="index.php?remove=<?php echo $fetch_cart['id']; ?>" class="" onclick="return confirm('Remove item from cart?');">Remove</a></div>
                            </div>
                    <?php
                            $grand_total += $sub_total;
                        }
                    } else {
                        echo '<div style="padding:20px; text-transform:capitalize;">No items added</div>';
                    }
                    ?>
                    <hr>
                    <div class="table-bottom">
                        <div class="spl">
                            <div class="row">
                                <div class="col-6">Grand Total:</div>
                                <div class="col-6 text-end">$<?php echo $grand_total; ?>/-</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <a href="index.php?delete_all" onclick="return confirm('Delete all from cart?');" class="btn btn-danger <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Delete All</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="form.php" class="btn btn-primary <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>