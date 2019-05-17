<html>
<body>
<?php
$db = mysqli_connect('localhost', 'root', '', 'miniproject');
if(isset($_GET[‘deleteid’]))
{
$name=$_GET[‘deleteid’];
$qry='delete from users where uname=$name';
$query1=mysqli_query($db,$qry);
echo "success";
}
?>
</body>
</html>