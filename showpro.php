<?php


if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{



?>



<!DOCTYPE html>
<html>
<head>
	<title>Details page</title>
	<h2 style="color:blue;">Property Details:</h2>

</head>
<body >

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">



<?php


include("lib.php");


$jsonData= getJSONFromDB("select * from propertyinfo");

$jsn=json_decode($jsonData);






foreach ($jsn as $v) 
{

	if( $_GET["d"] ==  $v->PropertyID )

		{


			?>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif; text-align: left;"> <spen style="color:green;">Rent Giver Username:</spen>  <?php  echo $v->UserName; ?></h3>
  
  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Price: </spen><?php   echo $v->Price;  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Phone:</spen> <?php  echo $v->Phone;  ?></h3>
   
  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Email: </spen><?php   echo $v->Email; ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Area:  </spen><?php  echo $v->Area;  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;">Address</spen> <?php  echo $v->Address;  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"><spen style="color:green;">Number Of Rooms:</spen> <?php  echo $v->Room;  ?></h3>

  <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"><spen style="color:green;">Size:</spen>  <?php  echo $v->Size;  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> Floor:</spen>  <?php  echo $v->Floor;  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> PropertyID:</spen>  <?php  echo $v->PropertyID;  ?></h3>

   <h3  style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;text-align: left;"> <spen style="color:green;"> House Image:</spen></h3>

   <img src="<?php  echo $v->Image;  ?>"  height="300" width="400"      alt="">
                     

 

<?php   
                  
                  break;  





		}





    } 








?>



<br><br><br><a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a>


<?php


$id =(int)$_GET['d'];

$jsonData= getJSONFromDB("select  renttakerUsername ,PropertyID from request where  
  renttakerUsername=  '".$_COOKIE["uname"]."' and PropertyID = $id     ");

$jsn1=json_decode($jsonData);



if (count($jsn1) )
   {

    


  ?>


<a href="#"  style="width: 97%;background-color:orange;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;" onclick="return false"   >
   Request Pending
 </a>

  <?php
     
}    
   




else

{

?>


<a href='rentRequest.php?d=<?php echo $_GET["d"] ; ?> ' style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">
     Place Request
   </a>


<?php

 
           
           
}




?>







<a href="renttaker.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Back</a><br><br><br>





</div>




</body>
</html>

<?php

}



else
{

 echo "<h1 style='color:red;text-align:center;'>You are not authorized to enter this page without Login.</h1><br><br>";

 echo "<h1 ><b style='color:black;text-align:center;'><u>Login First:</u><a  href='login.php' style='color:green;text-decoration:none;' >Go To Login Page    </a></b></h1>";

 

       
}







?>