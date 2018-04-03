<!DOCTYPE html>
<html lang="en">
<head>
<title>Learn Center | Login</title>
<?php include('inc/header.inc.php'); ?>
<?php
	$db = mysqli_connect('localhost', 'root', '', 'vtc');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = md5(mysqli_real_escape_string($db,$_POST['password'])); 
      
      $sql = "SELECT indexnumber FROM users WHERE indexnumber = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: profile.php");
      }else {
         $error = "Your Index Number or Password is invalid";
      }
   }
?>
<div class="body2">
  <div class="main">
    <!-- content -->
		<form style="border:1px solid #ccc" method ='POST' >
		  <div class="container">
			 <h1 class="pad_bot1">Please log in to continue.</h1>
			<hr>

			
			<input type="text" placeholder="Enter Index Number" name="uname" required>
			
			<input type="password" placeholder="Enter Password" name="password" required>
			
			
			<div class="clearfix">
			  <button type="submit" class="submitbtn" name="login" >Log in</button>
			</div>
		  </div>
		</form>
		
    <!-- content -->
    <?php include('inc/footer.inc.php'); ?>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>