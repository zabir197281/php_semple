<?php

if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{

$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" delete from propertyinfo where PropertyID= ".$_GET["d"]."     " ;






$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );


header("Location:propertyReq.php");


}



else
{

 echo "<h1 style='color:red;text-align:center;'>You are not authorized to enter this page without Login.</h1><br><br>";

 echo "<h1 ><b style='color:black;text-align:center;'><u>Login First:</u><a  href='login.php' style='color:green;text-decoration:none;' >Go To Login Page    </a></b></h1>";

 

       
}




?>