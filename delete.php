<?php include "connection.php";
?>
<html>
<head>
<title>
	Delete records
</title>
<style type="text/css">
table{
	border:1px solid black;
	border-collapse:collapse;	
}
td,th{
	border:1px solid black;
	padding:40px;
}
</style>
</head>
<body >
<?php 
$qry="select * from users";
$result=mysqli_query($db,$qry);
?>
<?php
if(isset($_POST['submitDeleteBtn'])){
	$key=$_POST['keyToDelete'];
	$data="select * from users";
	$res=mysqli_query($db,$data);
	if(mysqli_num_rows($res)>0)
	{
		$del_query="delete from users where uname='$key' ";
		$queryDelete=mysqli_query($db,$del_query);
	?>
		<p>Record deleted</p>
		
	<?php
		header('location:delete.php');
	}
	else
	{
	?>
	<p>Record does not exists</p>
	<?php 
	}
}
?>	
<table align="center">
<tr>
	<th>S.no</th>
	<th>NAME</th>
	<th>DEPARTMENT</th>
	<th>TYPE</th>
	<th> SELECT</th>
	<th>DELETE IT</th>
</tr>
<?php
$sr=1;
	while($row=mysqli_fetch_array($result)){
?>
<tr>
	<form action="" method="post" role="form">
		<td><?php echo $sr; ?> </td>
		<td><?php echo $row['uname'];?> </td>
		<td><?php echo $row['udept'];?> </td>
		<td><?php echo $row['utype'];?> </td>
		<td>
			<input type="checkbox" name="keyToDelete" value="<?php echo $row['uname'];?>" required>
		</td>
		<td>
			<input type="submit" name="submitDeleteBtn" value="DELETE">
		</td>
	</form>
</tr>
<?php $sr++;}
?>
</table>
<center><a href="adminpage.php">BACK</a></center>
</body>
</html>