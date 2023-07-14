<?php
session_start();
$grandtotal=$_SESSION["grand_total"];
?>

<!-- <?php echo $grandtotal?> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<div class="card d-flex flex-column align-items-center justify-content-center border border-dark" style="width: 40%; height: 60%; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="card-header">
        <img src="jellies-logo.jpg" alt="Icon" class="icon-image">
    </div>
    <form class="card-body">
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name"><br>
        <input type="text" name="amt" id="amt" class="form-control" value="1" readonly="readonly" ><br>
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" class="btn btn-primary">
    </form>
</div>



<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_live_OfsaXh1GqgNnzR", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Jellies-AI",
                        "description": "Test Transaction",
                        "image": "jellies-logo.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>