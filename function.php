
<?php

function logindataRead()
{


global $temp;
global $cred;



$connect = mysqli_connect( "localhost", "root", "","final_project");

$sql=" select * from login ";

$result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );

while ($row = mysqli_fetch_assoc($result)  ) 
{

$uname = trim($row["UserName"] );
$pass = trim( $row["Password"]) ;
$utype	=  trim($row["UserType"] );

$temp [ $uname ] = $pass ;

$cred [ $uname ] = $utype ;

}


}















?>