<?php

if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{





?>

<!DOCTYPE html>
<html>
<head>
	<p><u><h2>The List of Request:</h2></u></p>

</head>
<body>

<p>
<table style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">PropertyID</th>

  

    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Renttaker Username </th>

    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Price</th>


  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Accept</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Regect</th>


  
</tr>


<?php



include("lib.php");

$jsonData= getJSONFromDB("select  PropertyID,renttakerUsername,p_rize  from request where  
  rentgiverUsername =  '".$_COOKIE["uname"]."'  and  Buy_request='pending'  ");

$jsn=json_decode($jsonData);




if(count($jsn))

{

foreach ($jsn as $v) 

{

	
?>




  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->PropertyID;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->renttakerUsername;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->p_rize;   ?></td>
    
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='RGaccept.php?d=<?php echo $v->PropertyID ;?>&u=<?php echo $v->renttakerUsername;?>' >
     Accept</a></td>

     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:red;' href='RGregect.php?d=<?php echo $v->PropertyID ;?>&u=<?php echo $v->renttakerUsername;?>' >
     Reject</a></td>


    

   



  </tr>


<?php 
           


   }

 }

else
{

echo "<h1 style='color:red;text-align:center;'>No Request Have been Made.</h1><br><br>";


}





?>


</table>

<a href="rentgiver.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Back</a><br>
<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br>   


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