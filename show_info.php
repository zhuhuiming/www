<?php 
if(!isset($id) or $id=="") die("error: id none"); 
//定位记录,读出 
$conn=mysql_connect("127.0.0.1","root","zhuhuiming"); 
if(!$conn) die("error: mysql connect failed"); 
mysql_select_db("mydatabase",$conn); 
$sql = "select file_name ,file_size from receive where id=$id"; 
$result = mysql_query($sql); 
if(!$result) die(" error: mysql query"); 
//如果没有指定的记录，则报错 
$num=mysql_num_rows($result); 
if($num<1) die("error: no this recorder"); 
//下面两句程序也可以这么写 
//$row=mysql_fetch_object($result); 
//$name=$row->name; 
//$size=$row->size; 
$name = mysql_result($result,0,"file_name"); 
$size = mysql_result($result,0,"file_size"); 
mysql_close($conn); 
echo "<hr>上传的文件的信息："; 
echo "<br>The file's name - $name"; 
echo "<br>The file's size - $size"; 
echo "<br><a href=show_add.php?id=$id>附件</a>"; 
?> 