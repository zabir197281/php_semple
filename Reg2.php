
<?php

session_start();

$_SESSION["sameuname"]=$_POST["uname"];



 if(isset($_POST["submit"]))
         {

  $x = 0 ;

   $connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" select * from login ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );

while ($row = mysqli_fetch_assoc($result)  ) 
{

	global $x;

    if ( $_POST["uname"] == trim($row["UserName"]) ) 

    {
       
       global $x;

       $x++ ;

       


    }
     

}



 if(strpos($_POST["email"],"@")!=0 && strpos($_POST["email"],"@") < strrpos($_POST["email"],".",-1) && $_POST["cpass"]==$_POST["pass"] && 
    $_POST["fname"]!="" && $_POST["lname"]!="" && $_POST["phon"]!="" && $_POST["email"]!="" && $_POST["pass"]!="" && $_POST["uname"]!="" &&
    $_POST["cpass"]!="" && strlen($_POST["pass"])>4 && strlen($_POST["phon"]) == 11 && strpos($_POST["phon"],"0") == 0 && 
    is_numeric($_POST["phon"]) && strlen($_POST["uname"])>3 && strpos($_POST["email"],"@") != -1 && strpos($_POST["email"], "@")  && $x == 0  )
  {
    
   $_SESSION["success"]="yes";


if($_POST["utype"]=="RentTaker")


{



$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into renttakerinfo values ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["uname"]."','".$_POST["phon"]."','".   
$_POST["email"]."','".md5($_POST["pass"])."','".$_POST["group1"]."','".$_POST["occupatio"]."','".$_POST["utype"]."'

) ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );











}



if($_POST["utype"]=="RentGiver")


{



$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into rentgiverinfo values ('". $_POST["fname"] ."','".$_POST["lname"]."','".$_POST["uname"]."','".$_POST["phon"]."',
'".   $_POST["email"]."','".md5($_POST["pass"])."','".$_POST["group1"]."','".$_POST["occupatio"]."','".$_POST["utype"]."') ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );



}



$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" insert into login values ('".$_POST["uname"]."' ,'".md5($_POST["pass"])."' , '".   $_POST["utype"]."') ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );








}


header("Location:Reg.php");

}
 ?>