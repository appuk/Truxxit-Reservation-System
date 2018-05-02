<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome, <?php echo $login_first_name; ?>!</h1> 
	  
	  <?php
	  $sql = "SELECT * FROM user inner join customer on user.sys_id=customer.cust_id where user.login_id='$login_session'";
      $result = mysqli_query($db,$sql); // see if user is a customer...
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      if ($count == 1) { // user is a customer (not a driver)
		 $_SESSION['user_type'] = "customer";
		 echo "<h2><a href = \"profile_customer/\">Manage My Account</a></h2>";
		 //header("location: customer_profile.php");
		 echo "<h2><a href = \"customer_card/\">Manage Payment</a></h2>";
      } else {
		 // user is a driver 
		 $_SESSION['user_type'] = "driver";
		 echo "<h2><a href = \"profile_driver\">Manage My Account</a></h2>";
      }
   
?>
	  <hr>
	  <h2><a href = "logout.php">Sign Out</a></h2>
	<br>
	  <?php include 'footer.php'; ?>
