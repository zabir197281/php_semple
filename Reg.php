
<?php
session_start();


?>

<!DOCTYPE html>
<html>



<head>

<script  type="text/javascript">


var xmlhttp = new XMLHttpRequest();
var pError = 0 ;





function showHint()
{

    

    var uname = document.getElementById("uname").value;



  

           xmlhttp.onreadystatechange = function()
            {

                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                          {



                               if(this.responseText==1)
                                   {

                            
                                        document.getElementById("una").innerHTML="";
                                        document.fm.uname.style.color="red";
                                        document.getElementById("una").innerHTML="This User Name is already taken.";
                                        document.getElementById("una").style.color="red";





                                         pError=1;
                                    }

                              else  
                                    {

                                           if(uname.length<4)
                                                      {
                                           
                                                          document.getElementById("una").innerHTML="";
                                                          document.fm.uname.style.color="red";
                                                          document.getElementById("una").innerHTML="User name must be of atleast  4 characters.";
                                                          document.getElementById("una").style.color="red";

                                                       }


                                             else
                                                     {
                                                           document.getElementById("una").innerHTML="";
                                                            document.fm.uname.style.color="black";
                                                            document.getElementById("una").innerHTML="Valid User Name.";
                                                            document.getElementById("una").style.color="green";


                                                      }

 


                                           pError=0;
                                    }      

                                  
                             }
                      

            };
  
   

     var url="";

      url="ajaxreg.php?uname="+uname;

  
     xmlhttp.open("GET",url,true);
     xmlhttp.send();

  


  



}





 

function passwor()

{  
	
  var un = document.fm.pass.value;


	if (un.length < 5)
	{
    document.fm.pass.style.color="red";
    document.getElementById("pas").innerHTML="Password must be of atleast  5 characters.";
	  document.getElementById("pas").style.color="red";
      
	}
	    	
	else


	{
        document.fm.pass.style.color="black";
		    document.getElementById("pas").innerHTML="Valid Password.";
	      document.getElementById("pas").style.color="green";


	}




}



function conpass()

{  
	var pa = document.fm.pass.value;
	var co = document.fm.cpass.value;


	if ( pa != co )
	{
        
        document.fm.cpass.style.color="red";
        document.getElementById("con").innerHTML="Password doesn't match.";
	      document.getElementById("con").style.color="red";
      
	}
	    	
	else


	{
        document.fm.cpass.style.color="black";
	     	document.getElementById("con").innerHTML="Passwoed have matched.";
	      document.getElementById("con").style.color="green";


	}




}




function phonevad()

{  
	var un = document.fm.phon.value;
	var n = un.indexOf("0");


	if (un.length != 11 || n != 0 || isNaN(un) )
	{
        document.fm.phon.style.color="red";
        document.getElementById("pho").innerHTML="Invalid Phone Number.";
	      document.getElementById("pho").style.color="red";
    
	}
	    	
	else


	{
        document.fm.phon.style.color="black";
		    document.getElementById("pho").innerHTML="Valid  Phone Number.";
	      document.getElementById("pho").style.color="green";


	}




}





function emailvad()

{  
	
  var un = document.fm.email.value;
	



   if (un.indexOf('@') == -1 ||  un.indexOf('@') == 0) 
   {
      document.fm.email.style.color="red";
      document.getElementById("eml").innerHTML="Invalid Email .";
	    document.getElementById("eml").style.color="red";

    



    } 

    else {

        var parts = un.split('@');
        var domain = parts[1];

        if (domain.indexOf('.') == -1)
         {

            

    
        document.fm.email.style.color="red";
      	document.getElementById("eml").innerHTML="Invalid Email .";
	      document.getElementById("eml").style.color="red";



        }

         else 
        {

            var domainParts = domain.split('.');
            var ext = domainParts[1];
            var ext1= domainParts[0];

            if (ext.length > 4 || ext.length < 2 ||  ext1.length <= 0  )
             {
             

         document.fm.email.style.color="red";
         document.getElementById("eml").innerHTML="Invalid Email .";
	       document.getElementById("eml").style.color="red";

             }

           else

           {

          	document.fm.email.style.color="black";
	         	document.getElementById("eml").innerHTML="Valid Email.";
	          document.getElementById("eml").style.color="green";


           }


         }


         }




}




function validate() 
{


var ffn = document.fm.fname.value;
var lln = document.fm.lname.value;
var uun = document.fm.uname.value;
var ppa = document.fm.pass.value;
var cca = document.fm.cpass.value;
var ppo = document.fm.phon.value;
var eea = document.fm.email.value;
var flag = true;





document.getElementById("una").innerHTML="";
document.getElementById("pas").innerHTML="";
document.getElementById("con").innerHTML="";
document.getElementById("pho").innerHTML="";
document.getElementById("eml").innerHTML="";





if(ffn.length == 0  || lln.length == 0  || uun.length == 0  || ppa.length == 0  || cca.length == 0  || ppo.length == 0  || eea.length == 0   )

{




      
          
       
       document.getElementById("fill").innerHTML="Please Fill Up all the Fields.";
       document.getElementById("fill").style.color="red";

        flag = false;





}




else {



  document.getElementById("fill").innerHTML="";
  

 if (uun.length < 4 || pError == 1  )
 {
          
               if(uun.length < 4) 
               {


                  document.fm.uname.style.color="red";
                  document.getElementById("una").innerHTML="User name must be of atleast  4 characters.";
                  document.getElementById("una").style.color="red";
                }

                else
                {


                            document.fm.uname.style.color="red";
                            document.getElementById("una").innerHTML="This User Name is already taken.";
                            document.getElementById("una").style.color="red";

                }
            



           flag = false;
    

}


 if (ppa.length < 5)

  {
        
        document.getElementById("pas").innerHTML="Password must be of atleast  5 characters.";
        document.getElementById("pas").style.color="red";
      
        flag = false;
      
  }


  if ( ppa != cca )
  {

        document.getElementById("con").innerHTML="Password doesn't match.";
        document.getElementById("con").style.color="red";
      


        flag = false;
  }


 if (ppo.length != 11 || ppo.indexOf("0") != 0 || isNaN(ppo) )
  {


        document.getElementById("pho").innerHTML="Invalid Phone Number.";
        document.getElementById("pho").style.color="red";
    
       flag = false;
  }


  





if ( ! (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(fm.email.value) ))
  
 {
         document.getElementById("eml").innerHTML="Invalid Email .";
         document.getElementById("eml").style.color="red";
     

         flag = false;


 }




}

 


return flag ;



}




</script>





	
</head>






<body>

<h2 style="text-shadow: 1px 1px blue"> <U style="color: blue;">Regeistration Please</U></h3>

<div style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">





  <form action="Reg2.php" method="post" id="fm" name="fm">

    <label for="fname"></label><b>First Name:</b></label>
    <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="fname" name="fname" placeholder="First Name..."><br> <br>
    

    <label for="lname"></label><b>Last Name:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="lname" name="lname" placeholder="Last Name...."><br> <br>

     

    <label for="uname"><b>User Name:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="uname" name="uname"    onkeyup="showHint()"                placeholder="User Name....">

    

   

   
   <br>
    <b id="una"></b>
    <br> <br>

     




     <label for="pass"><b>Password:</b></label><b>(min: 5)</b>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="pass" name="pass" onkeyup="passwor()" placeholder="Password....">

    <br>
    <b id="pas"></b>
    <br> <br>

    
    


    <label for="cpass"><b>Conferm Password:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="password" id="cpass" name="cpass"  onkeyup ="conpass()"      placeholder="Conferm Password....">


     <br>
    <b id="con"></b>
    <br> <br>




   <label for="phon"><b>Phone:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text"  id="phon" name="phon"   onkeyup="phonevad()"  placeholder="Phone..." >

     <br>
    <b id="pho"></b>
    <br> <br>



    <label for="email"><b>Email:</b></label>
   <input style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;
    box-sizing: border-box;" type="text" id="email" name="email"   onkeyup=" emailvad()" placeholder="Email...">


 <br>
    <b id="eml"></b>
    <br> <br>


   

    <label ><b>Gender:</b></label>

     <p>
      <label>
        <input name="group1" type="radio"  value="Male" checked />
        <span>Male</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio"  value="Female" />
        <span>Femail</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" value="Others"  />
        <span>Others</span>
      </label>
    </p>

    <p>

<label ><b>Occupation:</b></label><br><br>
<select  name="occupatio">
  <option value="Student">Student</option>
  <option value="Survice holder">Survice holder</option>
  <option value="Unemployed">Unemployed</option>
  <option value="Businessman">Businessman</option>
 
</select>
  
    </p>


     <p>

<label ><b>User Type:</b></label><br><br>
<select  name="utype">
  <option value="RentTaker">Rent Taker</option>
  <option value="RentGiver">Rent Giver</option>
  
 
</select>
  
    </p><br>


    <b id="fill"></b>
    <br> 
  

    <?php

if (isset($_SESSION["success"])) 
{
  echo "<h3 id='sus' style='color:green'> Registration is Successful</h3>";
}

unset($_SESSION["success"]);

?>


    
  
    <input style="width: 100%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;
    cursor: pointer;float: left;" type="submit"  name="submit" onclick =" return validate() "    value="Submit"><br><br><br>

   

  </form>

   <a href="F.php" title=""  style="width: 97%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;
   border-radius: 4px; cursor: pointer;text-align:center;text-decoration: none;float:left;">Back</a><br><br><br>

 


</div>






</body>
</html>

