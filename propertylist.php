<?php

if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{





?>

<!DOCTYPE html>
<html>
<head>
	<p><u><h2>PROPERTY LIST :</h2></u></p>

   <script  type="text/javascript">

	
	
function valid()

{  
	 var un = document.fm.username.value;

	 var flag = true;


	 if (un.length == 0)
	 {
       

        document.getElementById("una").style.color="red";
        document.getElementById("una").innerHTML="Enter a User Name  Property ID First.";

	     flag = false;

     }


     return flag;

 }


 </script>



</head>
<body>

	

<form action="propertylist.php" method="post"  name="fm">

	<h3>Search With Username or Prodect Id:</h3>
      <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" name="username" placeholder="User Name or ProdectID....">

     <b id="una"></b>

<input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="search"  onclick="return  valid()"    value="search"><br>




     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="showall" value="Show All"><br>








</form>
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
  color: white;">Remove Property</th>



  </tr>


<?php

if ( !(  (isset($_POST["search"]))  ||  (isset($_POST["showall"]) )  ) ) 
{





include("lib.php");

$jsonData= getJSONFromDB("select * from propertyinfo   where Sratus='yes' ");

$jsn=json_decode($jsonData);




if(count($jsn))

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
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:red;' href='removepro.php?
     	d=<?php echo $v->PropertyID ; ?> ' >

    

     REMOVE</a></td>



  </tr>


<?php 
           


   }

 }

else
{

echo "<h1 style='color:red;text-align:center;'>NO PROPERTY FOUND.</h1><br><br>";


}


}


?>

<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<?php

if (isset($_POST["search"]) ) 
{









include("lib.php");

$id =(int)$_POST["username"];

$jsonData= getJSONFromDB("select * from propertyinfo where 	UserName ='".$_POST["username"]."'  or PropertyID= $id 
 and Sratus='yes'  ");

$jsn=json_decode($jsonData);




if(count($jsn))

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
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:red;' href='removepro.php?
     	d=<?php echo $v->PropertyID ; ?> ' >

    

     REMOVE</a></td>



  </tr>


<?php 
           


   }

 }

else
{

echo "<h1 style='color:red;text-align:center;'>NO PROPERTY FOUND.</h1><br><br>";


}



}


?>


<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<?php

if ( isset($_POST["showall"]) ) 
{





include("lib.php");

$jsonData= getJSONFromDB("select * from propertyinfo  where Sratus='yes'");

$jsn=json_decode($jsonData);




if(count($jsn))

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
     <td style="border: 1px solid #ddd; padding: 8px;"><a style='text-decoration:none;color:red;' href='removepro.php?
     	d=<?php echo $v->PropertyID ; ?> ' >

    

     REMOVE</a></td>



  </tr>


<?php 
           


   }

 }

else
{

echo "<h1 style='color:red;text-align:center;'>NO PROPERTY FOUND.</h1><br><br>";


}


}


?>



</table>

<a href="admincon.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
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