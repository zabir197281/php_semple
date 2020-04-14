


<?php


if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{


?>


<!DOCTYPE html>
<html>
<head>


<script  type="text/javascript">

	
	
function valid()

{  
	 var un = document.fm.uname.value;

	 var flag = true;


	 if (un.length == 0)
	 {
       

        document.getElementById("una").style.color="red";
        document.getElementById("una").innerHTML="Enter a User Name First.";

	     flag = false;

     }


     return flag;

 }


 </script>



</head>
<body>
<p><h2>Admin Page:</h2></p>

<p>
    
  <form action="admincon.php" method="post" name="fm">
    <strong>User List:</strong>
     <select  style="width: 100%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
     box-sizing: border-box;"
id="utist" name="ulist">
      <option value="RentTaker">Rent Taker</option>
      <option value="RentGiver">Rent Giver</option>
      


    </select>

    


<strong>Search User(User Name):</strong>

 <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" name="uname" placeholder="User Name...">
    

    <b id="una"></b>

     
     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="search" value="search"   onclick="return  valid()"  ><br>


     <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="showall" value="Show All"><br>




  </form> 


<a href="Changeadminpass.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Change Password</a><br>


   
  


</p>



<p>
<table style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;">
  <tr>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Name :</th>


    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">User Name: </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Phone: </th>
    <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Email:</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Gender:</th>

  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Occupation:</th>


  <th style="border: 1px solid #ddd; padding: 8px;padding-top: 12px;padding-bottom: 12px;text-align: left;
  background-color: #4CAF50;
  color: white;">Type:</th>




  </tr>


  <!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->



  <?php


if(isset($_POST["search"]) &&   $_POST["ulist"] == "RentTaker" )

{

include("lib.php");

$jsonData= getJSONFromDB("select * from   renttakerinfo ");

$jsn=json_decode($jsonData);

$i=0;

foreach ($jsn as $v) 
{

if ($_POST["uname"] == $v->UserName )
 {
  
 global $i;

 $i++



 ?>


<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->FirstName ."  ". $v->LastName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserName ;  ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Gender ;  ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Occupation;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserType;   ?></td>
     

 </tr>


<?php 






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


if(isset($_POST["search"]) &&   $_POST["ulist"] == "RentGiver" )

{


include("lib.php");

$jsonData= getJSONFromDB("select * from   rentgiverinfo ");

$jsn=json_decode($jsonData);



$i=0;

foreach ($jsn as $v) 
{

if ($_POST["uname"] == $v->UserName  )
 {
  
 global $i;

 $i++



 ?>


<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->FirstName ."  ". $v->LastName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserName ;  ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Gender ;  ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Occupation;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserType;   ?></td>
     

 </tr>


<?php 






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

if(isset($_POST["showall"]) &&   $_POST["ulist"]== "RentGiver" )

{


include("lib.php");

$jsonData= getJSONFromDB("select * from   rentgiverinfo ");

$jsn=json_decode($jsonData);


foreach ($jsn as $v) 
{




 ?>


<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->FirstName ."  ". $v->LastName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserName ;  ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Gender ;  ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Occupation;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserType;   ?></td>
     

 </tr>


<?php 








 }




}


?>




<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->






<?php

if(isset($_POST["showall"]) &&   $_POST["ulist"]== "RentTaker" )

{


include("lib.php");

$jsonData= getJSONFromDB("select * from   renttakerinfo ");

$jsn=json_decode($jsonData);


foreach ($jsn as $v) 
{




 ?>


<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->FirstName ."  ". $v->LastName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserName ;  ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Gender ;  ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Occupation;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserType;   ?></td>
     

 </tr>


<?php 








 }




}


?>





<!--- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  -->






<?php

if( !  (  isset($_POST["showall"]) ||  isset($_POST["search"]) )   )

{





include("lib.php");

$jsonData= getJSONFromDB("select * from   renttakerinfo ");

$jsn=json_decode($jsonData);


foreach ($jsn as $v) 
{


?>


<tr >
    <td style="border: 1px solid #ddd; padding: 8px;" ><?php echo $v->FirstName ."  ". $v->LastName;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserName ;  ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Phone;   ?></td>
    <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Email;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Gender ;  ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->Occupation;   ?></td>
     <td style="border: 1px solid #ddd; padding: 8px;"><?php  echo $v->UserType;   ?></td>
     

 </tr>


<?php 








 }




}


?>




 
</table>
</p>



<a href="propertyReq.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">See Property Request
</a><br>

<a href="propertylist.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;"> Property List
</a><br>

<a href="transaction.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">See Transaction Histry
</a><br>

<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br>







<br><br>





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