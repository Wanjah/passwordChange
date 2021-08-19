<?php 
//include connection page
include "config.php";
//start session
session_start();
?>
<html>
<head>
	<!--styling page elements-->
	<style>
		body{
			background-image:url("cute_wall.jpg");
			background-repeat: no-repeat;
			background-position: left; top;
			background-attachment: fixed;
			padding: 15px;
		}

		div{
			width: 400px;
			margin: auto;
		
			background-color: silver;
			align-items: center;
		}
		h1{
			color:black;
			text-align: center;
			font-family: cooper black;
		}
		h2{
			color:black;
			text-align: center;
			font-family: cooper black;
		}
		.error {color:red;}
	</style>
	<!--page title-->
	<title>HEALTHY EATING ASSISTANT</title>
</head>
<body>
	<!--First header-->
	<h1>HEALTHY EATING INTELLIGENT AGENT</h1>
	<br>
		<!--navigation bar-->
	<nav>
		<ul>
		<li>
			<a href="foodweb.html"
			target="_top">HOME</a></li>
		<li>
			<a href="Registration form2.php">REGISTRATION</a></li>
		<li>
		<a href="ulogin.php">LOGIN</a></li>
		</ul>
	</nav>
	<div>
		<h2>CHANGE PASSWORD</h2>
         <div>
		 <!--logo text-->
            <p>Enter credentials</p>
           <!--start of the login Form-->
            <form action="forgotPassword.php" method="post">
                <div class="container">
					<!--form labels-->
					<!--form input text boxes to fetch the users data-->
                  <label for="email"><b>Enter email address: </b></label><br>
                  <input type="text" placeholder="email" name="email" ><br><br>

                  <label for="newPass"><b>Enter new password:</label><br>
                  <input type="password" placeholder="NewPassword" name="newPass"><br><br>

                  <label for="confirmPass"><b>Confirm new password:</label><br>
                  <input type="password" placeholder="Passwordconfirm" name="confirmPass" ><br><br>
				  
                  <button type="submit" name="changepassword">Change password</button>             
                </div>                
              </form>
<?php
	//when user clicks change password button and is already logged in
	if(isset($_POST['changepassword'])){
	//defining variables from textboxes that contain data entered in textboxes
		$email =$_POST['email'];
		$newPass=$_POST['newPass'];
		$confirmPass=$_POST['confirmPass'];
	//checking whether required fields have been filled
		if(empty($email) || empty($newPass) || empty($confirmPass)){?>
			<span class="error"><?php echo "All fields are requierd.";?></span><?php
		}else{
			//check whether newpassword and confirmpassword are the same
			if($newPass !== $confirmPass){?>
				<span class="error"><?php echo "New Password and Password confirm should be the same.";?></span><?php
			}
			else{
			//select email from clients table and change the oldPassword to the newPassword
				$query="UPDATE clients SET password ='$newPass' WHERE email='$email';";
				$run=mysqli_query($conn,$query);
				echo "Password successfully changed";
				echo "<script>window.open('ulogin.php','_self')</script>";
			}//else{echo "query did not execute"};
		}		
	}
?>
         </div>
<hr><br>
	<!--redirect the user to the signup page-->
    <div>
        <p>Dont Have An Account? <a href="Registration form.php"> Register Here</a></p>
    </div>
         
     </div>
     <!--end of login page-->
</body>
</html>