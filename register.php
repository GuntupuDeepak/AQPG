<?php 
      session_start();
      if(!$_SESSION['type']==1)
             {
                   header("location:login.php");
             } 
include("connection.php");

	// variable declaration
	$uname = "";
	$uemail    = "";
	
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
	
if(isset($_POST['Submit'])=="Register")
{
// REGISTER USER
		// receive all input values from the form
		$uname = $_POST['uname'];
		$uemail =$_POST['uemail'];
		$upassword_1 = $_POST['upassword_1'];
		$upassword_2 =  $_POST['upassword_2'];
		$utype= $_POST['utype'];

		if($utype=="1")
		{
			$utypeadmin="checked";
			$utype="1";
		}
		if($utype=="2")
		{
			$utypehod="checked";
			$utype="2";
		}
		if($utype=="3")
		{
			$utypefaculty="checked";
			$utype="3";
		}
		if($utype=="4")
		{
			$utypestudent="checked";
			$utype="4";
		}
		$udept=  $_POST['udept'];
		if($udept=="cse")
		{
			$udeptcse="checked";
			$udept="cse";
		}
		if($udept=="it")
		{
			$udeptit="checked";
			$udept="it";
		}
		if($udept=="ece")
		{
			$udeptece="checked";
			$udept="ece";
		}
		if($udept=="eee")
		{
			$udepteee="checked";
			$udept="eee";
		}

    $_SESSION["username"]=$_POST["uname"];
	$query = "INSERT INTO users (uname,upassword,uemail,utype,udept) VALUES('$uname', '$upassword_1','$uemail','$utype','$udept')";
	mysqli_query($db, $query);
    echo "<script>location.href='delete.php'</script>";
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
<script language="javascript" type="text/javascript">
    function validate()
    {
    if(document.getElementById("uname").value=="")
    {
        alert("Please Enter Your Name");
        document.getElementById("uname").focus();
        return false;
    }
if(document.getElementById("upassword_1").value=="")
    {
        alert("Please Enter Your Password");
        document.getElementById("upassword_1").focus();
        return false;
    }

    if(document.getElementById("upassword_2").value=="")
    {
        alert("Please ReEnter Your Password");
        document.getElementById("upassword_2").focus();
        return false;
    }
    if(document.getElementById("upassword_2").value!="")
    {
          if(document.getElementById("upassword_2").value != document.getElementById("upassword_1").value)
          {
               alert("Confirm Password doesnot match!");
               document.getElementById("upassword_2").focus();
               return false;
          }
    }
    
    var emailPat=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    var emailid=document.getElementById("uemail").value;
    var matchArray = emailid.match(emailPat);

    if (matchArray == null)
    {
        alert("Your email address seems incorrect. Please try again.");
        document.getElementById("uemail").focus();
        return false;
    }
function validatetype (radios)
{
    for (i = 0; i < radios.length; ++ i)
    {
        if (radios [i].checked) return true;
    }
    return false;
}

    if(validatetype (document.forms["registration"]["utype"]))
    {
        return true;
    }
    else
    {
        alert('Please select a type');
        return false;
    }

   
function validatedept (radio)
{
    for (i = 0; i < radio.length; ++ i)
    {
        if (radio [i].checked) return true;
    }
    return false;
}

    if(validatedept (document.forms["registration"]["udept"]))
    {
        return true;
    }
    else
    {
        alert('Please select a department');
        return false;
    }

    return true;
}
</script>
<body>
<br>
<form name="registration" action="register.php" method="post" onsubmit="return validate();">
	
	<div class="header">
		<h2> Registeration</h2>
	</div>
		<div class="input-group">
			<label>Username:</label>
			<input type="text" name="uname" id="uname" value="<?php echo $uname; ?>">
		</div>
		<div class="input-group">
			<label>Password:</label>
			<input type="password" id="upassword_1" name="upassword_1">
		</div>
		<div class="input-group">
			<label>Confirm password:</label>
			<input type="password" name="upassword_2" id="upassword_2" >
		</div>
		
		<div class="input-group">
			<label>Email:</label>
			<input type="text" name="uemail" id="uemail" value="<?php echo $uemail; ?>">
		</div>
		
		<div>
			<label>Type:</label>
			<br>
				
			&nbsp;&nbsp;<input type="radio" style="width: 1em; height: 1em;"name="utype" id="one" value="1" <?php echo $utypeadmin;?>>ADMIN<br>
			&nbsp;&nbsp;<input type="radio" style="width: 1em; height: 1em;"name="utype" id="two" value="2"<?php echo $utypehod;?>>HOD<br>
			&nbsp;&nbsp;<input type="radio" style="width: 1em; height: 1em;"name="utype" id="three" value="3"<?php echo $utypefaculty;?>> FACULTY<br>
			&nbsp;&nbsp;<input type="radio" style="width: 1em; height: 1em;"name="utype" id="four" value="4" <?php echo $utypestudent;?>>STUDENT<br>		
		</div>
		<div>
			<label>Department:</label>
			<br>
			<select>
 				 <option value="it" name="udept" id="udept">IT</option>
 				 <option value="cse" name="udept" id="udept">CSE</option>
                                                                       <option value="ece" name="udept" id="udept">ECE</option>
                                                                        <option value="eee" name="udept" id="udept">EEE</option>
</select>
		</div>
		<div class="input-group">
			<input type="submit" style="height: 50px; width: 800px"name="Submit" value="Register" >
		</div>
		<a href="adminpage.php">BACK</a>
	</form>	
</body>
</html>