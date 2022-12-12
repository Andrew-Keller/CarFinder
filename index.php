<?php

require_once('setup.php');
echo '<h2>Cars Found</h2>';
	echo '<div class="container" style="padding:35px;">';
  echo '<div class="col-8">';
        $result= $connection->prepare('SELECT * FROM products');
        $result->execute();
      while($products=$result->fetch()){
        echo '<div class="row" ><a href=detail.php?name='.$products['PID'].'">';
        echo '<h2>'.$products['Year'].' '.$products['Make'].' '.$products['Model'].'</h2>';
          echo '<p>'.'$ '.$products['Price'].'</p>';
          //echo '</div>';
        echo '</div>';
      }	
        echo '</div>';  
?>

