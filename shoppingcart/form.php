<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
  <title>customer details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 15px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Optional: Add some additional styling for better visual appeal */
    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus {
      border-color: #4CAF50;
    }

    label.error {
      color: red;
      margin-top: -10px;
      margin-bottom: 10px;
      font-size: 12px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Optional: Add some additional styling for better visual appeal */
    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus {
      border-color: #4CAF50;
    }

    label.error {
      color: red;
      margin-top: -10px;
      margin-bottom: 10px;
      font-size: 12px;
    }
    
  </style>
</head>

<body>
  <h1>Customer's Details</h1>
  <form action="process_form.php" method="POST">
    <div style="display: flex; flex-wrap: wrap;">

      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" required>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" required>
          </div>
        </div>


      </div>


      <div class="row">

        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="houseno">House Number:</label>
            <input type="text" name="houseno" id="houseno" required>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12">

          <div style="flex: 50%; padding: 5px;">
            <label for="streetno">Street Number:</label>
            <input type="text" name="streetno" id="streetno" required>
          </div>

        </div>
      </div>

      <div class="row">

        <div class="col-lg-6 col-sm-12">

          <div style="flex: 50%; padding: 5px;">
            <label for="pincode">Pincode:</label>
            <input type="text" name="pincode" id="pincode" required>
          </div>


        </div>

        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" required>
          </div>


        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-sm-12">



          <div style="flex: 50%; padding: 5px;">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" required>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12">



          <div style="flex: 50%; padding: 5px;">
            <label for="landmark">Landmark:</label>
            <input type="text" name="landmark" id="landmark" required>
          </div>

        </div>



      </div>

      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
          </div>

        </div>

        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="mobileno">Mobile Number:</label>
            <input type="text" name="mobileno" id="mobileno" required>
          </div>

        </div>

      </div>



      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div style="flex: 100%; padding: 5px;">
            <label for="address">Address:</label>
            <textarea name="address" id="address" rows="4" required></textarea>
          </div>


        </div>
        <div class="col-lg-6 col-sm-12">

          <div style="flex: 50%; padding: 5px;">
            <label for="buildingname">Building Name:</label>
            <input type="text" name="buildingname" id="buildingname" required>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" required>
          </div>

        </div>

        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="alternatemobileno">Alternate Mobile Number:</label>
            <input type="text" name="alternatemobileno" id="alternatemobileno">
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div style="flex: 50%; padding: 5px;">
            <label for="streetname">Street Name:</label>
            <input type="text" name="streetname" id="streetname" required>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">

          <div style="flex: 100%; padding: 5px;">
            <input type="submit" value="Submit">
          </div>

        </div>
        




      </div>





    </div>
  </form>

</body>

</html>