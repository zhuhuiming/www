<?php 
if(!isset($id) or $id=="") die("error: id none"); 
//��λ��¼,���� 
$conn=mysql_connect("127.0.0.1","root","zhuhuiming"); 
if(!$conn) die("error: mysql connect failed"); 
mysql_select_db("mydatabase",$conn); 
$sql = "select file_name ,file_size from receive where id=$id"; 
$result = mysql_query($sql); 
if(!$result) die(" error: mysql query"); 
//���û��ָ���ļ�¼���򱨴� 
$num=mysql_num_rows($result); 
if($num<1) die("error: no this recorder"); 
//�����������Ҳ������ôд 
//$row=mysql_fetch_object($result); 
//$name=$row->name; 
//$size=$row->size; 
$name = mysql_result($result,0,"file_name"); 
$size = mysql_result($result,0,"file_size"); 
mysql_close($conn); 
echo "<hr>�ϴ����ļ�����Ϣ��"; 
echo "<br>The file's name - $name"; 
echo "<br>The file's size - $size"; 
echo "<br><a href=show_add.php?id=$id>����</a>"; 
?> 