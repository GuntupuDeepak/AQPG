<?php

	$db = mysqli_connect('localhost', 'root', '', 'miniproject');
	if (isset($_POST['delete_user'])) 
	{
		if(!empty($duser))
		{
		$duser=$_POST['duser'];
		$sql="delete from users where uname=$duser";
		$query=mysqli_query($db,$sql);
			if($query)
			{
			echo "deleted successfully";
			}
			else
			{
				echo "not deleted";
			}
		}
	}

?>

<html>
<head>
<title>
delete user
</title>
</head>
<body align="center">
<h1>DELETE USER</h1>
<form action="" method="post" align="center">
User Name:<input type="text" name="duser" >
<br>
<br>
<input type="submit" name="delete_user" value="DELETE">
</body>
</html>