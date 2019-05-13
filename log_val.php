 <?php
       function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
         
	// variable declaration
	$uname= "";
	$uemail= "";
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
              if(isset($_SESSION['name']))
     	          {
      		    $uname=test_input($_SESSION['name']);
      		    $upassword=test_input($_SESSION['password']);
     	          }
              else {
                
		$uname = mysqli_real_escape_string($db, $_POST['uname']);
		$upassword = mysqli_real_escape_string($db, $_POST['upassword']);
                }

		if (empty($uname)) {
			array_push($errors, "Username is required");
		}
		if (empty($upassword)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM users WHERE uname='$uname' AND upassword='$upassword'";
			$results = mysqli_query($db, $query);
			if($row = mysqli_fetch_array($results)) {
      				$type=$row['utype'];
    				 if($type=='1')
     				{
				header('location:adminpage.php');		
				}
				 if($type=='2')
     				{
				header('location:hod.php');		
				}
				if($type=='3')
     				{
				header('location:faculty.php');		
				}
				if($type=='4')
     				{
				header('location:student.php');		
				}
                    
                           $_SESSION['name']=test_input($row['uname']);
                           $_SESSION['password']=test_input($row['upassword']);
                           $_SESSION['type']=test_input($row['utype']);
                       
                         
  			 }	
	}
?>