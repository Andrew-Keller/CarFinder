<?php
//create.php
require_once('setup.php');
	
if(count($_POST)>0){
	$query=$connection->prepare('INSERT INTO products (Year,Make,Model,Price) VALUES (?,?,?,?)');
	$query->execute([$_POST['year'],$_POST['make'],$_POST['model'],$_POST['price']]);
}

echo '<form method="POST">
	<div style="padding:35px;">
	Make: <input name="make" type="text"/>
	Model: <input name="model" type="text"/>
	<div class="form-group">
    <label for="exampleFormControlSelect2">Year</label>
    
    <select multiple class="form-control" id="exampleFormControlSelect2" name ="year">';
    	for($i=2023;$i>1950;$i--){
      	echo '<option>'.$i.'</option>';
  }
   echo' </div></select>
  </div>
Price: <input name="price" type="text"/>
<div class="row">
<button type="submit">Submit</button>
</div>
</form>';
?>