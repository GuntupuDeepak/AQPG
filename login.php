<?php 
   $nameErr=$passErr="";
        
  session_start();
  	if(isset($_SESSION['name']))
           {
      		require 'log_val.php';
	   }        
?>

<html>
<head>
       <?php
   	if($_SERVER["REQUEST_METHOD"] == "POST") 
             {
            if (empty($_POST["uname"])) 
                    	{
    				$nameErr = "Name is required";
 		    	}
               else if (empty($_POST["upassword"])) 
                   	{
                        	$passErr = "password is required";
                   	} 
               else
		   	{
          		  if(isset($_POST['login']))
			    {
	        	     	require 'log_val.php';
                            }
		   	} 
            }
?>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<br>
<br>
<h1 align="center" >AUTOMATIC QUESTION PAPER GENERATOR</h1>
<br>
<br>
	<div class="header">
		<h2>Login Page</h2>
	</div>
	
	<form method="post" action="login.php">
                

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="uname" >
                        <span class="error">* <?php echo $nameErr;?></span> 
		</div>
                 <br><br>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="upassword">
                         <span class="error">* <?php echo $passErr;?></span>
		</div>
                <br><br>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		
	</form>


</body>
</html>