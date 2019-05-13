<html>
<body>
<?php 
  session_start();
  if(!isset($_SESSION['name']))
            {
         	 echo "<script>window.location='login.php';</script>";
            }      	
      else if($_SESSION['type']==1)
             {
                   header("location:adminpage.php");
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
      		    echo " hello this is HOD";
              }
?>
<h1>hod</h1>
<br>
 <center><a href="logout.php">logout</a></center>
</body>
</html>