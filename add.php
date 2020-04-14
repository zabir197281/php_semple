<?php

session_start();


if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{







?>








<!DOCTYPE html>
<html>

<script  type="text/javascript">


function valid()
{


var price = document.fm.price.value;
var size = document.fm.Size.value;
var floor = document.fm.Floor.value;
var nofrooms = document.fm.nofrooms.value;
var address = document.fm.Address.value;
var ufile = document.fm.ufile.value;


var flag = true;




if(price.length == 0  || size.length == 0  || floor.length == 0  || nofrooms.length == 0  || address.length == 0  || ufile.length == 0 )

{




          
       
       document.getElementById("fill").innerHTML="Please Fill Up all the Fields.";
       document.getElementById("fill").style.color="red";

        flag = false;




}














return flag;





}

  


</script>






















<body>

<h2 style="text-shadow: 1px 1px blue">Insert property</h3>

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">




  <form action="add.php" method="post"  name="fm" enctype="multipart/form-data">

    <label for="price"><b>Price(TK) :</b></label>
    <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="price" name="price" placeholder="price...">
    

    <label for="Size"><b>Size(Sq):</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Size" name="Size" placeholder="Size....">

      <label for="Floor"><b>Floor:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Floor" name="Floor" placeholder="Floor....">


   
     




     <label for="nofrooms"><b>Number of rooms:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="nofrooms" name="nofrooms" placeholder="Number of rooms....">
    
    


    <label for="Address"><b>Address:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="Address" name="Address" placeholder="Address...">


      <label for="files"><b>Uplode House Picture:</b></label><br>
   <input style="width: 35%;padding: 12px 20px;color:blue; font-weight:bold;background-color: white;     margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="file" id="files" name="ufile">




    



   


  
  

   


     <p>

<label ><b>Area:</b></label><br><br>
  <select  name="area">
  <option value="Gulshan">Gulshan</option>
  <option value="Motijheel">Motijheel</option>
  <option value="Nayapolton">Nayapolton</option>
  
 
</select>
  
    </p><br><br><br>



     <b id="fill"></b>
  
    <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="submit"  onclick=" return  valid() "   value="Submit"><br><br><br>

  

   

  </form>

   <a href="rentgiver.php" title=""  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float:left;">Back</a><br><br>



<a href="Logout.php"  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Logeout</a><br><br><br>


  

</div>






</body>
</html>
 
 <?php


if(isset($_POST["submit"]))
         {




$filename = $_FILES["ufile"]["name"];
$tempfile = $_FILES["ufile"]["tmp_name"];

$foider = "House_pic/".$filename ;

move_uploaded_file($tempfile, $foider);









if( $_POST["price"]!="" && $_POST["Size"]!="" && $_POST["Floor"]!="" && $_POST["nofrooms"]!="" && $_POST["Address"]!="" && $filename != "" )
  {
     
   


$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" select * from rentgiverinfo ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );

$cre = array();

while ($row = mysqli_fetch_assoc($result)  ) 
{




if ($_SESSION["uname"] ==  trim($row["UserName"] ) )
   {
  
  global $cre;
     

  $cre["uname"]=$row["UserName"];
  $cre["phon"]=$row["Phone"];
  $cre["email"]=$row["Email"];
  
  break;


}

     
   

}


$status="no";


$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into propertyinfo (UserName, Price, Phone, Email, Area, Address, Room, Size, Floor, Image,Sratus)

values ('".  $cre["uname"]      ."','".   $_POST["price"]       ."','".  $cre["phon"]        ."','".    $cre["email"]          ."',

'".   $_POST["area"]       ."','".  $_POST["Address"]     ."','".   $_POST["nofrooms"]       ."','".   $_POST["Size"]       ."','".   $_POST["Floor"]       ."' , '".  $foider  ."' ,'".$status."'

) ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );






echo "<h3 style='color:green'>Inserted Successfully.</h3>";


}

}





?>




<?php

}



else
{

 echo "<h1 style='color:red;text-align:center;'>You are not authorized to enter this page without Login.</h1><br><br>";

 echo "<h1 ><b style='color:black;text-align:center;'><u>Login First:</u><a  href='login.php' style='color:green;text-decoration:none;' >Go To Login Page    </a></b></h1>";

 

       
}


?>