<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <style>
        #a1 {
            position: relative;
            margin: 80px 80px 80px 80px;

        }

        #a2 {
            position: absolute;
            top: 250px;
            left: 40%;
        }

        /* .all{
            position: relative;
        } */

        .itm {
            position: relative;
            /* top:20px; */
            left: 20px;


        }

        .qnt {
            position: absolute;
            top: 0;
            left: 350px;
        }

        .pp {
            position: absolute;
            top: 0;
            left: 550px;
        }

        .remove {
            position: absolute;
            top: 70px;
            left: 550px;
        }

        .rem1 {
            position: relative;

        }

        .tot {
            position: absolute;
            top: 250px;
            left: 20px;
        }

        .prc {

            position: absolute;
            top: 250px;
            left: 500px;
        }

        /* .container1{
            margin-bottom: 150px;
        } */

        a {
            text-decoration: none;
            /* color: black; */
        }

        h3,
        h1 {
            font-family: 'Kanit', sans-serif;
        }

        .navbar {
            margin-left: 80px;
            margin-right: 80px;
        }



        h1 {
            font-family: 'Chakra Petch', sans-serif;
            font-family: 'Marcellus', serif;
            font-family: 'Maven Pro', sans-serif;
        }

        h3 {

            font-family: 'Chakra Petch', sans-serif;
            font-family: 'Marcellus', serif;
            font-family: 'Maven Pro', sans-serif;
        }

        p {
            font-family: 'Chakra Petch', sans-serif;
            font-family: 'Gilda Display', serif;
            font-family: 'Marcellus', serif;
            font-family: 'Maven Pro', sans-serif;
        }



        .navbar-brand {
            font-family: "Ubuntu";
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>

<body>

</body>

</html>

<?php
session_start();
$database_name = "Product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);
if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="sell.php"</script>';
        } else {
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="sell.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="sell.php"</script>';
            }
        }
    }
}
?>

<?php
$query = "SELECT * FROM product ORDER BY id ASC ";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

?>

        <fieldset>

            <section id="title">

                <div class="container1">


                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="" style="color:black; font-size:x-large;">J e l l i e s - A I</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                            <ul class="navbar-nav ms-auto">

                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                    <i class="fa fa-search " aria-hidden="true"></i>
                                </li>

                                <li class="nav-item ps-3">
                                    <i class="fa fa-cart-arrow-down " aria-hidden="true"></i>
                                </li>

                                <li class="nav-item ps-3">

                                    <a href="login/register.php">
                                        <i class="fa fa-user-circle " aria-hidden="true"></i></a>
                                </li>

                            </ul>
                        </div>


                    </nav>
                </div>
            </section>
            <div class="rem1">
                <h1 style="text-align: center;">
                    <?php if (!empty($_SESSION["cart"])) {
                        $total = 0;
                    } ?>
                    <hr>


                    Your bag total is <?php $total ?>

                    <?php
                    foreach ($_SESSION["cart"] as $key => $value) {
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);

                        echo number_format($total, 2);
                    }
                    ?>

                </h1>
                <a href="form.html">
                    <button class="btn btn-primary btn-lg" type="button" id="pbuy" style="border-radius: 22px; margin-left:43%;">Proceed to Buy</button>
                </a>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12" id=a1>


                    <form method="post" action="sell.php?action=add&id=<?php echo $row["id"]; ?>">

                        <div class="product">
                            <div class="selector1"><img src="<?php echo $row["image"]; ?>" class="img-responsive"></div>
                            <div class="selector2" style="margin-left:150px;">
                                <h5 class="text-dark"><?php echo $row["pname"]; ?></h5>
                            </div>
                            <div class="selector3" style="margin-left:150px;">
                                <h5>Amount:</h5>
                                <h5 class="text-dark"><?php echo $row["price"]; ?></h5>
                            </div>



                            <input type="text" name="quantity" class="form-control" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary btn-lg" value="Add to Cart">




                            <!-- <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                </div>
                                <div class="col-auto">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                </div>
                                <div class="col-auto">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary btn-lg" value="Add to Cart">
                                </div>
                            </div> -->
                        </div>
                    </form>
                </div>
        <?php
    }
}
        ?>


        <!-- <div style="clear: both"></div>
<h3 class="title2">Shopping Cart Details</h3> -->

        <div class="col-lg-6 col-sm-12">


            <div id="a2">


                <?php
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>

                        <div class="all">
                            <div class="itm">

                                <h3>

                                    <?php echo $value["item_name"]; ?>

                                </h3>

                            </div>
                            <div class="qnt">
                                <h3>
                                    <?php echo $value["item_quantity"]; ?>

                                </h3>

                            </div>

                            <div class="pp">
                                <h3>

                                    <?php echo $value["product_price"]; ?>
                                    <hr>

                                </h3>

                            </div>

                            <hr>


                        </div>


                        <h3>

                            <div class="remove">
                                <a href="sell.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span id="rm">Remove</span></a>
                                <hr>



                            </div>




                        </h3>

                        <h3>

                            <div class="rem">

                                <!-- $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> -->


                            <?php
                            $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                            ?>

                            </div>
                        </h3>



                        <div class="rem1">

                            <h3>

                                <div class="tot">

                                    Total

                                </div>

                                <div class="prc">
                                    <?php echo number_format($total, 2); ?>

                                </div>


                                <div>
                                    <button class="btn btn-primary btn-lg" type="button" id="pbuy" style="border-radius: 22px;  padding-left:60px;padding-right:60px; margin-top:350px; margin-left:170px;" onclick="window.location.href='login/register.php';">Proceed to Buy</button>
                                </div>

                            <?php
                        }
                            ?>
                            </h3>


                        </div>







            </div>
        </div>

        <div class="row" style="opacity:0.6; text-align:center; margin-left:80px; margin-top:80px;">



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

        <!-- </div> -->

        </fieldset>