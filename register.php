<?php 
      session_start();
      if(!$_SESSION['type']==1)
             {
                   header("location:login.php");
             } 
       if (isset($_POST['reg_user'])) {
         require 'reg_val.php';
        }
         
	// variable declaration
	$uname = "";
	$uemail    = "";
	$upassword_1="";
	$upassword_2="";
	$utype="";
	$udept="";
	$errors = array(); 
	
	$utypeadmin='unchecked';
	$utypehod='unchecked';
	$utypefaculty='unchecked';
	$utypestudent='unchecked';
	
	$udeptcse='unchecked';
	$udeptit='unchecked';
	$udeptece='unchecked';
	$udepteee='unchecked';
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'abc', 'deepak123', 'project');
    
 ?>

<html>
<head>
	<title>Create user</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Registeration</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username:</label>
			<input type="text" name="uname" value="<?php echo $uname; ?>">
		</div>
		<div class="input-group">
			<label>Password:</label>
			<input type="password" name="upassword_1">
		</div>
		<div class="input-group">
			<label>Confirm password:</label>
			<input type="password" name="upassword_2">
		</div>
		
		<div class="input-group">
			<label>Email:</label>
			<input type="text" name="uemail" value="<?php echo $uemail; ?>">
		</div>
		
		<div>
			<label>Type:</label>
			<br>
				
			&nbsp;&nbsp;<input type="radio" name="utype" value="1"<?php echo $utypeadmin;?>>ADMIN<br>
			&nbsp;&nbsp;<input type="radio" name="utype" value="2"<?php echo $utypehod;?>>HOD<br>
			&nbsp;&nbsp;<input type="radio" name="utype" value="3"<?php echo $utypefaculty;?>> FACULTY<br>
			&nbsp;&nbsp;<input type="radio" name="utype" value="4"<?php echo $utypestudent;?>>STUDENT<br>		
		</div>
		<div>
			<label>Department:</label>
			<br>
			
			&nbsp;&nbsp;<input type="radio" name="udept" value="cse"<?php echo $udeptcse;?>>CSE<br>
			&nbsp;&nbsp;<input type="radio" name="udept" value="it"<?php echo $udeptit;?>>IT<br>
			&nbsp;&nbsp;<input type="radio" name="udept" value="ece"<?php echo $udeptece;?>> ECE<br>
			&nbsp;&nbsp;<input type="radio" name="udept" value="eee"<?php echo $udepteee;?>> EEE<br>			
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>