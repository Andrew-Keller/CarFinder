<?php
//setup.php
session_start();
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384
	-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/
		bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-c
		uYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>';
echo '<script><script>
var slider = document.getElementById("lowprice");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script></script>';
echo '<head>
		<link rel="icon" href="logo.png" type = "image/x-icon">
		<title>Car Finder</title>
		</head>';
echo '
<header>
<nav class="navbar ">
    <div class="navbar">
    	<ul class="navbar-nav">
    	<li class="nav-item">
   			<a class="nav-link active" aria-current="page" href="index.php">Home</a>
    	</li>
    	<li class="nav-item">
    		<a class="nav-link active" aria-current="page" href="create.php">Create</a>
    	</li>';
    	//if the user is logged in it shows account
    	if (isset($_SESSION['auth_user'])){
    		echo '<li class="nav-item">
			<a class="nav-link" href="Account.php">Account</a>
    		</li>';}
    	//if user is not logged in it shows signup/login
    	else{
    		echo '<li class="nav-item">
    		<a class="nav-link" href="login.php">Login</a>
    		</li>';
    		echo '<li class="nav-item">
    		<a class="nav-link active" aria-current="page" href="signup.php">Sign Up</a>
    		</li>';}
    	echo '<li class="nav-item dropdown">
          
    	</li>
   		</ul>
    </div>
  </div>
</nav>
</header>';
$mainpage = '"/index.php"';

function MakeConnection($host,$db,$user,$pass,$port,$charset,$options)
{
	$connection = new \PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port",$user,$pass, $options);
}
//MakeConnection($host,$db,$user,$pass,$port,$charset,$options);
//this can be modified for another database
//variables

$host='127.0.0.1';
$db = 'CarFinder';
$user= 'root';
$pass='';
$port=3306;
$charset='utf8mb4';

$options=[
	\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
	\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
	\PDO::ATTR_EMULATE_PREPARES=>false,
];
$connection = new \PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port",$user,$pass, $options);

//functions 

function userExists($connection, $email){
	$query=$connection->prepare('SELECT * FROM users where Email=?');
	$query->execute([$email]);
    $result=$query->fetch();
		return (is_null($result['Email']));
}

function passwordMatch($conn, $password, $email){
    if (userExists($conn,$email)==False){
        $query=$conn->prepare('SELECT * FROM users where Email=?');
        $query->execute([$email]);
        $result=$query->fetch();
        $hashedpass = $result['Password'];
        $_SESSION['hashed']=(password_verify($password, $hashedpass));
        }
        return (password_verify($password, $hashedpass));
}


//scripts


//function userExists(){

//}


?>