
<?php
session_start();
if(!isset($_SESSION['name']))
            {
         	 echo "<script>window.location='login.php';</script>";
            }      	
      else if($_SESSION['type']==2)
             {
                   header("location:hod.php");
             }
      else if($_SESSION['type']==3)
             {
                    header("location:faculty.php");
              }
       else if($_SESSION['type']==4)
              {
                     header("location:student.php");
              }
      else
              {
      		    print_r($_SESSION['name']);
      		    echo " hello this is admin";
              }
?>

<html>
<body>
<h1 align="center">ADMIN</h1>
<form align="center">
<a href="register.php">REGISTER USER</a>
<br>
<br>
<a href="delete.php">DELETE USER</a>
<br>
<br>
<a href="logout.php">LOGOUT</a>
</form>

</body>
</html>
