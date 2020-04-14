<?php


if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{


?>



<!DOCTYPE html>
<html>
<head>


</head>
<body>
<p><h2>The list of rentable houses</h2></p>

<p>
    
  <form action="renttaker.php" method="post">
    <strong>Area:</strong>
     <select  style="width: 100%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
     box-sizing: border-box;"
id="area" name="area">
      <option value="Gulshan">Gulshan</option>
      <option value="Nayapolton">Nayapolton</option>
      <option value="Motijheel">Mothjheel</option>


    </select>

<strong>Price Range:</strong>

 <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" name="lprice" placeholder="Lower Price">
    <h2>
      TO
    </h2>

<input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text"  name="hprice" placeholder="Upper Price"><br>


     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="search" value="search"><br><br><br>


     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="showall" value="Show All"><br><br><br>




  </form> 
   
  


</p>



<p>
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
  color: white;">Phone </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Email</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Area</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Property Id</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Show Details</th>



  </tr>


  <?php



include("lib.php");

$jsonData= getJSONFromDB("select  UserName,Price,Phone, Email,Area,PropertyID from propertyinfo 
  where Sratus='yes' ");

$jsn=json_decode($jsonData);

if(isset($_POST["search"]))

{

	$i=0;
  



foreach ($jsn as $v) 

{

if( $_POST["lprice"] == "" &&  $_POST["hprice"] == ""  )

{


if ($_POST["area"] == $v->Area )
       {
  
 global $i;

 $i++;



?>




  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->UserName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Price;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Area;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->PropertyID;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='showpro.php?d=<?php echo $v->PropertyID ; ?> ' >

    

     See Details</a></td>



  </tr>


<?php 
           }


}

else
{



if ($_POST["area"] == $v->Area  &&   $_POST["lprice"] <= $v->Price  &&   $_POST["hprice"] >= $v->Price )
       {
  
 global $i;

 $i++;



?>




  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->UserName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Price;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Area;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->PropertyID;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='showpro.php?d=<?php echo $v->PropertyID ; ?> ' >

    

     See Details</a></td>



  </tr>


<?php 
           }













}







 }

        if ($i==0) 
        {
          echo "<h3 style='color:red;text-align:center';>No match found !!!</h3>";
        }

       }

    ?>




<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->





    <?php 
  
     
if( !(  (isset($_POST["search"]))  ||  (isset($_POST["showall"]) )  ) )
{

 
 
foreach ($jsn as $v)
 {



   ?>


 







  <tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->UserName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Price;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Area;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->PropertyID;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='showpro.php?d=<?php echo $v->PropertyID ; ?> ' >

    

     See Details</a></td>



  </tr>


<?php 
           
        
}

}

         

    ?>







<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->










<?php 
  
     
if(isset($_POST["showall"])) 
{





foreach ($jsn as $v)
 {



   ?>


 







<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->UserName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Price;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Area;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->PropertyID;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:green;' href='showpro.php?d=<?php echo $v->PropertyID ; ?> ' >

    

     See Details</a></td>



  </tr>


<?php 
           
        
}

}

         

    ?>
    



 
</table>
</p>
<a href="myRenthistory.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Rent History</a><br>

<a href="Changerenttakerpass.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Change Password</a><br>


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