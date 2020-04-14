<?php

if(isset($_COOKIE["valid"]) && $_COOKIE["valid"]=="yes")
{





?>

<!DOCTYPE html>
<html>

<body>

<script   type="text/javascript">


var xmlhttp = new XMLHttpRequest();

var pError = 0;



function showHint()
{

    pError = 0;

    var uname ="<?php echo $_COOKIE["uname"]; ?>";
    var pass = document.getElementById("passw").value;


  

           xmlhttp.onreadystatechange = function()
            {

                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                          { 

                           
     
                             if(this.responseText==0)
                                    {
                                         pError=1;

                                    }

                            }        



            };
  
   

     var url="";

      url="ajaxlogin.php?uname="+uname+"&pass="+pass;

  
     xmlhttp.open("GET",url,true);
     xmlhttp.send();

  


  



}


function passwor()

{  
	
  var un = document.fm.newpss.value;


	if (un.length < 5)
	{
    document.fm.newpss.style.color="red";
    document.getElementById("pas").innerHTML="Password must be of atleast  5 characters.";
	  document.getElementById("pas").style.color="red";
	  document.getElementById("haha").innerHTML="";

     var el = document.getElementById("xxx");
        if(el != null)
         {
      
             document.getElementById("xxx").innerHTML="";
    

          }
      
	}
	    	
	else


	{
        document.fm.newpss.style.color="black";
		    document.getElementById("pas").innerHTML="Valid Password.";
	      document.getElementById("pas").style.color="green";
	      document.getElementById("haha").innerHTML="";

         var el = document.getElementById("xxx");
        if(el != null)
         {
      
             document.getElementById("xxx").innerHTML="";
    

          }


	}




}


















  
function valid()
{




var pw = document.fm.pass.value;
var npw = document.fm.newpss.value;


var flag =true;

if( pError == 1  )

{

    flag=false;

    
       document.getElementById("pas").innerHTML="";
      
       document.getElementById("haha").innerHTML="Wrong Password";
       document.getElementById("haha").style.color="red";

        var el = document.getElementById("xxx");
        if(el != null)
         {
      
             document.getElementById("xxx").innerHTML="";
    

          }

    
}

if (npw.length < 5)

  {
        document.getElementById("pas").innerHTML="";
        document.getElementById("haha").innerHTML="Password must be of atleast  5 characters.";
        document.getElementById("haha").style.color="red";

        var el = document.getElementById("xxx");
        if(el != null)
         {
      
             document.getElementById("xxx").innerHTML="";
    

          }
      
        flag = false;
      
  }





if( npw.length == 0  || pw.length == 0   )

{

    flag=false;
    document.getElementById("pas").innerHTML="";
    
    document.getElementById("haha").innerHTML="Please Fill up all the fields.";
    document.getElementById("haha").style.color="orange";
    var el = document.getElementById("xxx");
        if(el != null)
         {
      
             document.getElementById("xxx").innerHTML="";
    

          }
   

}


 






return flag;

}







</script>




<h3  style="text-shadow: 1px 1px blue">Change Password:</h3>

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
  <form action="Changerenttakerpass.php" name= "fm"  method="post">

    <label for="pass"><b>Current Password:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="passw" name="pass"  onkeyup="showHint()"     placeholder="Current Password...."><br>

     
     <label for="usernamr"><b>New Password:</b></label>
    <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="newpass" name="newpss" onkeyup="passwor()" placeholder="New Password...">
     <br>
    <b id="pas"></b>
    <br>
    





<?php




if (isset($_POST["submit"]))
 {

if($_POST["newpss"]!="" && strlen($_POST["newpss"])>4)

{


$temp=array();
$cred=array();


include("function.php");

logindataRead();



foreach ($temp as $k => $v) {
  


  if( $_COOKIE["uname"] == $k  &&  md5($_POST["pass"]) ==  $v  )

  {
    $newpass = md5($_POST['newpss']);
    $uname=$_COOKIE["uname"];


    $connect = mysqli_connect( "localhost", "root","","final_project");

    $sql="update  login set `Password`= '".$newpass."'  where 	UserName = '".$uname."' ";


    $result = mysqli_query($connect,$sql) or die  ( mysqli_error($connect)  );



    
    


    echo "<b  id='xxx' style='color:green'> Successfully Changed Password.</b>";


  

  }

  
}


}


}

?>















<b    id='haha'    style='color:red'></b>

 <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;" type="submit" value="Change Password" onclick=" return  valid()"  name="submit"><br>

   

  </form>

  <a href="rentgiver.php" title=""  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float: left;">Back</a><br><br><br>

</div>

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