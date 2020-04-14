<?php


$temp=array();
$cred=array();


include("function.php");

logindataRead();

$y=0;



foreach ($temp as $k => $v) {
  


  if( $_GET["uname"] == $k  &&  md5($_GET["pass"]) ==  $v  )
  {

     global $y;
     $y=1;

  }

  
}



echo $y;










?>