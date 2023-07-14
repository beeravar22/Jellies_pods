<?php
// Retrieve form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$houseno = $_POST['houseno'];
$streetno = $_POST['streetno'];
$pincode = $_POST['pincode'];
$city = $_POST['city'];
$state = $_POST['state'];
$landmark = $_POST['landmark'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$address = $_POST['address'];
$buildingname = $_POST['buildingname'];
$country = $_POST['country'];
$alternatemobileno = $_POST['alternatemobileno'];
$streetname = $_POST['streetname'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cart"; // Update the database name here

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert form data into the database
$sql = "INSERT INTO customer (fname, lname, houseno, streetno, pincode, city, state, landmark, email, mobileno, address, buildingname, country, alternatemobileno, streetname)
        VALUES ('$fname', '$lname', '$houseno', '$streetno', '$pincode', '$city', '$state', '$landmark', '$email', '$mobileno', '$address', '$buildingname', '$country', '$alternatemobileno', '$streetname')";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>





</head>

<body>


  <div class="card d-flex flex-column align-items-center justify-content-center border border-dark" style="width: 40%; height: 40%; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="card-header">
      <img src="razorpay/jellies-logo.jpg" alt="Icon" class="icon-image">
    </div>
    <form class="card-body">
      <?php echo "To confirm your order, make payment here."; ?>

      <a href="razorpay/index.php" class="btn btn-primary btn-sm d-flex justify-content-center mt-3">
        Pay Here
      </a>
    </form>
  </div>


</body>

</html>