<!DOCTYPE html>
<html>
<head>

</head>
<body style="background-color:powderblue; font-size: 28px ">




<ul style=" list-style-type: none; margin: 0;padding: 0;overflow: hidden;background-color: #333;position: sticky;top: 0;">

  <li style="float: left;"><a  style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none ; background-color: #4CAF50;"  href="#home">Home</a></li>

  <li style="float: left;"><a style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"  href="login.php">Login</a></li>

  <li style="float: left;"><a style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"  href="Reg.php">Registration</a></li>
</ul>
   
<div >
   <marquee>
  <h2 style="color: black ;"> BD Rental Service </h2>
   </marquee>
</div> 
   
  

<img style="float:right;" src="Fotolia_30691356_Subscription_XL.jpg" alt="">

<h3 >Why should we use this sites?</h3>
<ul>
  <li>This is the best site to rent house in dhaka.</li>
  <li>We ensure youe security even after you rent the house.</li>
  <li>The rent giver can not move you from house with out any valid reason.</li>
    <li>The rent can not be increased before six month. </li>
    <li>The rent taker and rent giver will both have an aggriment. </li>
</ul>
   
<br/>



<h4 style="color: black ;">   Contact Us : 01303070781,01303064685  </h4><br/>



<?php

$data=array();
include("lib.php");
loadFromXML();


foreach ($data as $v) 

{

  

  if($v["name"]=="Abdullah-Al-Zabir")
  {

    ?>

<b><u><span style="font-size:30px;color:green "> FOUNDER:</span></u></b><br>



<b>Name:</b><span> <?php echo $v["name"];     ?> </span><br>
<b>Age:</b><span> <?php echo $v["age"];     ?> </span><br>
<b>University:</b><span> <?php echo $v["school"];     ?> </span><br><br><br>



<?php
}


  if($v["name"]=="Shadman Saki")
  {

    ?>



<b><u><span style="font-size:30px;color:green  "> Cofounder:</span></u></b><br>



<b>Name:</b><span> <?php echo $v["name"];     ?> </span><br>
<b>Age:</b><span> <?php echo $v["age"];     ?> </span><br>
<b>University:</b><span> <?php echo $v["school"];     ?> </span><br><br><br>




<?php
}





}

?>







</body>
</html>
