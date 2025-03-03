<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$cn=mysql_connect("localhost","root","");
mysql_select_db("sybca");
$del="delete from student where no='".$_GET['id']."'"; 
mysql_query($del);
header("location:main.php");
?>
</body>
</html>