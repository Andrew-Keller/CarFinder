<?php
//Login.php
require_once('setup.php');

if (!isset($_POST['submit'])) {//user gets to page
	echo '<div class="container">
	Log in to CarFinder Account<br>
	<form method="post" action="login.php">
		<div class="row">
		Email:<input type="text" name="email">
		</div><br>
		<div class="row">
		Password:<input type="password" name="password">
		</div>
		<div class="row">';
		if (isset($_GET['error'])){
			echo'<p style="color:red">Invalid Login</p><br>';
		}
		echo '<button type="submit" name="submit" value="submit">Log In</button>
		</div>
		</form>
		';
}

else {

	if (passwordMatch($connection,$_POST['password'],$_POST['email'])==True)
		{
		$_SESSION['auth_user'] = $_POST['email'];
		header('Location: index.php');
	}
	else{
		unset($_POST['submit']);
		header('Location: login.php?error=invalidLogin');
	
	}
	
}

?>