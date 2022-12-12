<?php
//signup.php
require_once('setup.php');

echo '<h3>Create an Account</h3>';
//echo '<div style="align:center;">';
if (isset($_GET['form'])){
	echo '<p style="color:red;">All fields required!</p>';
}
if (!isset($_POST['submit'])) {

	
	echo '<div class="row" style="padding:35px;">';
	echo '<form method="post" action="signup.php">
		<div class="row">

		First Name:<input type="text" name="fname">
		</div>
		<br>
		<div class="row">
		Last Name:<input type="text" name="lname">
		</div>
		<br>
		<div class="row">
		City:<input type="text" name="city">
		</div>
		<br>
		<div class="row">';
		if(isset($_GET['emailinuse'])){
			echo '<p style="color:red;">Email is already in use!</p><br>';
		}
		echo 'Email:<input type="text" name="email">
		</div><br>
		<div class="row">';
		if(isset($_GET['passwordmismatch'])){
			echo '<p style="color:red;">Passwords must match!</p><br>';
		}
		echo 'Password:<input type="password" name="password">
		</div><br>
		<div class="row">
		Re-Enter Password:<input type="password" name="repassword">
		</div>
		<div class="row">
		<button  value="submit" name="submit" type="submit">Sign Up</button>
		</div>
	  </form>';
	echo '</div>';
//echo '</div>';
}
else {//if form was submitted
	
	if(!isset($_POST['fname'],$_POST['lname'],$_POST['city'],$_POST['email'],$_POST['password'],$_POST['repassword'])) {
		header("Location: signup.php?form=invalid");
		}//checks all fields for values
	else{	
		if (!$_POST['password']==$_POST['repassword']) {
			$_POST['passwordmismatch']="True";
			header("Location: signup.php?passwordmismatch=True");}//passwords dont match//passswords dont match//passwords dont match
		else{//passwords do match
			if (userExists($connection,$_POST['email'])==False) {//user email exists already
				header("Location: signup.php?emailinuse=True");//user email exists
				}
			else{//user email unique
				$hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);//hash the password
				$name = $_POST['fname'].' '.$_POST['lname'];
				$query=$connection->prepare('INSERT INTO users (Name,Email,Password,City) VALUES (?,?,?,?)');
					if (($query->execute([$name,$_POST['email'],$hashedpassword,$_POST['city']]))==TRUE){header("Location: signup.php?created=True");}
				}

			}
		
		}


		}
	


?>