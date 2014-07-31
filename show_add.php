<?php 
if(!isset($id) or $id=="") die("error: id none"); 
//定位记录,读出 
$conn=mysql_connect("127.0.0.1","root","zhuhuiming"); 
if(!$conn) die("error : mysql connect failed"); 
mysql_select_db("mydatabase",$conn); 
$sql = "select * from receive where id=$id"; 
$result = mysql_query($sql); 
if(!$result) die("error: mysql query"); 
$num=mysql_num_rows($result); 
if($num<1) die("error: no this recorder"); 
$data = mysql_result($result,0,"file_data"); 
$type = mysql_result($result,0,"file_type"); 
$name = mysql_result($result,0,"file_name"); 
mysql_close($conn); 
//先输出相应的文件头,并且恢复原来的文件名 
header("Content-type:$type"); 
header("Content-Disposition: attachment; filename=$name"); 
echo $data; 
?> 