<?php

if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{



include("lib.php");

$id =(int)$_GET['d'];

$jsonData= getJSONFromDB("select UserName,Price from propertyinfo where PropertyID= $id  ");

$jsn=json_decode($jsonData);

foreach ($jsn as $v)
{
	$UserName = $v->UserName;
	$Price = $v->Price;
	

}

$Buy_request="pending";


$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into request (PropertyID,renttakerUsername,rentgiverUsername,p_rize,Buy_request)

values ($id,'".$_COOKIE["uname"]."','".$UserName."','".$Price."' ,'".$Buy_request."') ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );


header("Location:showpro.php?d=$id ");





}



else
{

 echo "<h1 style='color:red;text-align:center;'>You are not authorized to enter this page without Login.</h1><br><br>";

 echo "<h1 ><b style='color:black;text-align:center;'><u>Login First:</u><a  href='login.php' style='color:green;text-decoration:none;' >Go To Login Page    </a></b></h1>";

 

       
}









?>