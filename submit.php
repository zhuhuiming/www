<?php 
$dest_file=$upload_path.basename($_FILES['myfile']['name']);
echo $dest_file;
if($myfile != "none" && $dest_file != "") { //有了上传文件了 
//设置超时限制时间,缺省时间为 30秒,设置为0时为不限时 
$time_limit=60; 
set_time_limit($time_limit); // 
//把文件内容读到字符串中
$fp=fopen("C:\\wamp\\www\\files\\CR-ah6udfCcEe.jpeg", "rb"); 
if(!$fp) die("file open error"); 
$file_data = addslashes(fread($fp, filesize($myfile))); 
fclose($fp); 
unlink($myfile); 
//文件格式,名字,大小 
$file_type=$myfile_type; 
$file_name=$myfile_name; 
$file_size=$myfile_size; 
//连接数据库,把文件存到数据库中 
$conn=mysql_connect("127.0.0.1","root","zhuhuiming"); 
if(!$conn) die("error : mysql connect failed"); 
mysql_select_db("test",$conn); 
$sql="insert into receive 
(file_data,file_type,file_name,file_size) 
values ('$file_data','$file_type','$file_name',$file_size)"; 
$result=mysql_query($sql); 
//下面这句取出了刚才的insert语句的id 
$id=mysql_insert_id(); 
mysql_close($conn); 
set_time_limit(30); //恢复缺省超时设置 
echo "上传成功--- "; 
echo "<a href='show_info.php?id=$id'>显示上传文件信息</a>"; 
} 
else { 
echo "你没有上传任何文件"; 
} 
?> 