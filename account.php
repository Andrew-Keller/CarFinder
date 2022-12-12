<?php
//account.php
require_once('setup.php');

if(isset($_SESSION['auth_user'])){//user is logged in
	 $result= $connection->prepare('SELECT * FROM users WHERE Email=?;');
        $result->execute([$_SESSION['auth_user']]);
        $products=$result->fetch();
	echo 'You are logged in!<br>';
	echo '
		<form method>
		<div class="row">
		<div class="col">
		Email:<br>';
		echo '<p>'.$products['Email'].'</p>';
		echo 'Name:<br>';
		echo '<p>'.$products['Name'].'</p>';
		echo 'City:<br>';
		echo '<p>'.$products['City'].'</p>';
	//logout button
	echo '<form method="get" action="">
	<button type="submit" name="submit" value="submit">Logout</button>
	</form>';

	if(isset($_GET['submit'])){
		unset($_SESSION['auth_user']);
		header('Location: index.php');}	
}

else{
	header('Location: index.php');}

?>