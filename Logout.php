<?php
foreach($_COOKIE as $k=>$v){
	
	setcookie($k,"",time()-1);


}

header("Location:login.php");


?>