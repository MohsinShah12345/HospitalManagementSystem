<?php
session_start();
?>
<!Doctype html>
<head>
<title>
Hospital Management System
</title>
<style>
body, html {
  height:98%;
  margin: 0;
}

.Dbg {
  background-image: url("images/HSM.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
ul {
  list-style-type: none;
  overflow: hidden;
  background-color: #333;
}
.AL a {
  float: left;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.AR a{
float:right;
}
li a:hover {
  background-color: #111;
}
.Adatablock{
   width:350px;  
   margin-top:200px;
   margin-left:500px;
   background-color:orange;
   
}
.ALsearchB{
   height:2.7em;
   width:10em;
   color:white;
   background-color:black;
   border:black;
}
.ALsearch1{
   height:1.5em;
   text:bold;
}
#ALsearch2{
   height:1.5em;
   text:bold;
}
.lab{
   font-size: 150%;
}
h1{
   margin-left:60px;
}
.passlab{
   font-size: 120%;
}
</style>
</head>
<body>

  <div class="Dbg">
    <ul>
       <li class="AL"><a class="active" href="Frontpage.php"><b>Home</b></a></li>
       <li class="AL"><a href="#News"><b>News</b></a></li>
       <li class="AL"><a href="#ContatUs">Contact Us<b></b></a></li>
       <li class="AR"><a class="active" href="#about"><b>About Us</b></a></li>    
   </ul>
   <?php
     if(isset($_SESSION["admail"])){
header("location: PatientsRecord.php");
}  
   if(isset($_POST['login'])){
        include("connection.php");
        $a_email=$_POST['aemail'];
		$a_pass=$_POST['apass'];
		$qury="select * from adminlog where adm_email='$a_email'";
		$reg=mysqli_query($connection,$qury);
		$row=mysqli_fetch_array($reg);
		$dbemail=$row['adm_email'];
		$_SESSION['ademail']=$dbemail;
		$dd=$_SESSION['ademail'];
		$dbpass=$row['password'];
		//$fullpass=md5($dbpass);
		if($a_email==null || $a_pass==null)  "<h3 class='text-center'>Please Enter Password And Username</h3>";
		else {
		     if($dbemail==$a_email &&  $dbpass == $a_pass){
			      echo "<h3>You are login</h3>";
				  header("location: PatientsRecord.php" );
			 }
			  else{ 
			  echo "<h3> Invalid User</h3>";}
			  
		//$qury="select * from admin where email='$email'";
		
	
	}	
 }
 
?>
  <div class="Adatablock">
      <form class="fa" action="AdminLogin.php" method="post">
	 <fieldset>
         
		 
           <h1>Admin Login</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <label class="lab"><b>Email:</b></label>
           <input type="text" class="ALsearch1" name="aemail" placeholder="Enter Email" required><br><br>
           <label class="lab"><b>Password:</b></label>
           <input type="password" id="ALsearch2" name="apass" placeholder="Enter Password" required><br><br>
           <input type="checkbox" onClick="myFunction()"><label class="passlab"><b>show password</b></label>
   <script>
     function myFunction() {
       var x = document.getElementById("ALsearch2");
         if (x.type === "password") {
            x.type = "text";
         } else {
            x.type = "password";
         }
     }
   </script>
          <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <button type="submit" class="ALsearchB" name="login" value="Login">Login</button>
		       
           </fieldset>
       </form>
       </div>
   </div>
</body>
</html>

