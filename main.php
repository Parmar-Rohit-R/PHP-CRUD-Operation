<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>demo</title>
</head>

<body>
<form method="post" enctype="multipart/form-data">
<h1><center>CRUD Operation</center></h1>
<table align="center" cellpadding="4" cellspacing="4">
<tr>
<th>No</th><td><input type="text" name="no" /></td>
</tr>
<tr>
<th>Name</th><td><input type="text" name="name" /></td>
</tr>
<tr>
<th>Address</th><td><textarea name="address"></textarea></td>
</tr>
<tr>
<th>City</th><td><input type="text" name="city" /></td>
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
<th>Pincode</th><td><input type="text" name="pincode" /></td>
</tr>
<tr>
<th>ContactNo</th><td><input type="text" name="contactno" /></td>
</tr>
<tr>
<th>EmailId</th><td><input type="text" name="email" /></td>
</tr>
<tr>
<th></th><td><input type="submit" name="add" value="ADDDATA" /></td>
</tr>
</table>
</form>
<?php
  $cn=mysql_connect("localhost","root","");
  mysql_select_db("sybca");
  if(isset($_POST['add']))
  {
	  $img=$_FILES['file1']['name'];
	  $dir="upload/";
	  $sql="insert into student values('$_POST[no]','$_POST[name]','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[gender]','$img','$_POST[pincode]','$_POST[contactno]','$_POST[email]')";
   move_uploaded_file($_FILES['file1']['tmp_name'],$dir.$img);
   mysql_query($sql,$cn);
  }
  echo "<table align='center' border='1'<tr><td width='70'>No</td><td width='70'>Name</td><td width='70'>Address</td><td width='70'>City</td><td width='70'>State</td><td width='70'>Gender</td><td width='70'>Image</td><td width='70'>Pincode</td><td width='70'>ContactNo</td><td width='70'>EmailId</td><td>Operation</td>
  </tr>";
  $search="select * from student";
  $result=mysql_query($search);
  while($rec=mysql_fetch_row($result))
  {
	  echo "<tr><td>$rec[0]</td><td>$rec[1]</td><td>$rec[2]</td><td>$rec[3]</td><td>$rec[4]</td>
	  <td>$rec[5]</td><td><img src=upload/".$rec[6]." width='50' height='50'></td><td>$rec[7]</td><td>$rec[8]</td><td>$rec[9]</td><td><a href='editmain.php?id=$rec[0]'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='delete.php?id=$rec[0]'>Delete</a></td>
	  </tr>";
  }
  
?>
</body>
</html>