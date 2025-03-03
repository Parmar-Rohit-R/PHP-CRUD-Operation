<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo</title>
</head>

<body>
<?php
 $cn=mysql_connect("localhost","root","");
 mysql_select_db("sybca");
 $sql="select * from student where no='".$_GET['id']."'";
 $result=mysql_query($sql);
 while($r=mysql_fetch_row($result))
 {
	   $no=$r[0];
	   $name=$r[1];
	   $add=$r[2];
	   $c=$r[3];
	   $p=$r[7];
	   $cn=$r[8];
	   $e=$r[9];
 }
?>
<form method="post" enctype="multipart/form-data">
<table align="center" cellpadding="4" cellspacing="4">
<tr>
<th>No</th><td><input type="text" name="no" value="<?php  echo $no;?>" /></td>
</tr>
<tr>
<th>Name</th><td><input type="text" name="namee" value="<?php echo $name;?>"/></td>
</tr>
<tr>
<th>Address</th><td><textarea name="address"><?php  echo $add;?></textarea></td>
</tr>
<tr>
<th>City</th><td><input type="text" name="city" value="<?php  echo $c;?>"/></td>
</tr>
<tr>
<th>State</th><td><select name="state">
<option>Gujarat</option><option>Rajshthan</option><option>Gova</option><option>Delhi</option>
<option>Karnatak</option><option>Mumbai</option><option>Utarpradesh</option></select></td>
</tr>
<tr>
<th>Gender</th><td><input type="radio" name="gender" value="male" />Male&nbsp;<input type="radio" name="gender" value="female" />Female</td>
</tr>
<tr>
<th>Image</th><td><input type="file" name="file1" /></td>
</tr>
<tr>
<th>Pincode</th><td><input type="text" name="pincode" value="<?php  echo $p;?>"/></td>
</tr>
<tr>
<th>ContactNo</th><td><input type="text" name="contactno" value="<?php  echo $cn;?>"/></td>
</tr>
<tr>
<th>EmailId</th><td><input type="text" name="email" value="<?php  echo $e;?>"/></td>
</tr>
<tr>
<th></th><td><input type="submit" name="update" value="UPDATE" /></td>
</tr>
</table>
</form>
<?php
$cn=mysql_connect("localhost","root","");
 mysql_select_db("sybca");
 if(isset($_POST['update']))
 {
 $img=$_FILES['file1']['name'];
 $dir="upload/"; 
$up="update student set name='$_POST[name]',address='$_POST[address]',city='$_POST[city]',
state='$_POST[state]',gender='$_POST[gender]',image='$img',pincode='$_POST[pincode]',
contactno='$_POST[contactno]',email='$_POST[email]' where no='".$_GET['id']."'";
mysql_query($up);
@move_uploaded_file($_FILES['file1']['tmp_name'],$dir.$img);
 header("location:main.php");
 }
?>
</body>
</html>