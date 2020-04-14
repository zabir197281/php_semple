<?php

session_start();


if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{



$_SESSION["uname"]=$_COOKIE["uname"];



?>

















<!DOCTYPE html>
<html>
<head>

<p><h1><u>Welcome to Rent Giver Page </u></h1></p><br>

</head>
<body>






<p>
	<h2 style="color: blue;">Houses That are up for rent:</h2>
<table style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Rentgiver Username</th>


    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Price(TK) </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Area</th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Address</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Number Of Room</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Size(Sq)</th>


  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Property Id</th>



  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Change Property Info</th>





  </tr>

<?php

$data=array();
$cd=array();



include("lib.php");

$jsonData= getJSONFromDB("select * from propertyinfo where Sratus='yes' ");

$jsn=json_decode($jsonData);


foreach ($jsn as $v) 
{
 
?>











  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->UserName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Price;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Area;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Address;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Room;   ?></td>
      <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Size;   ?></td>
      <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->PropertyID;   ?></td>


<?php




if ($_SESSION["uname"] ==  $v->UserName  )
   {

    


  ?>


<td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:blue;' href='changepro.php?d=<?php echo $v->PropertyID ; ?> ' >Make Changes </a></td>

</tr>


  <?php
     
}    
   




else

{

?>


<td style="border: 1px solid #ddd; padding: 8px;"><b style="color: red;">Not Authorized</b></td>

     
 </tr>


<?php

} 
           
           }

  



?>

  
 









 
</table>
</p>


<a href="add.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Insert Property</a><br>

   <a href="Changerentgiverpass.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Change Password</a><br>


<a href="seerentRequest.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">See Rent Request</a><br>


<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br><br><br>






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