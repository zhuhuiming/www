<?php 
$dest_file=$upload_path.basename($_FILES['myfile']['name']);
echo $dest_file;
if($myfile != "none" && $dest_file != "") { //�����ϴ��ļ��� 
//���ó�ʱ����ʱ��,ȱʡʱ��Ϊ 30��,����Ϊ0ʱΪ����ʱ 
$time_limit=60; 
set_time_limit($time_limit); // 
//���ļ����ݶ����ַ�����
$fp=fopen("C:\\wamp\\www\\files\\CR-ah6udfCcEe.jpeg", "rb"); 
if(!$fp) die("file open error"); 
$file_data = addslashes(fread($fp, filesize($myfile))); 
fclose($fp); 
unlink($myfile); 
//�ļ���ʽ,����,��С 
$file_type=$myfile_type; 
$file_name=$myfile_name; 
$file_size=$myfile_size; 
//�������ݿ�,���ļ��浽���ݿ��� 
$conn=mysql_connect("127.0.0.1","root","zhuhuiming"); 
if(!$conn) die("error : mysql connect failed"); 
mysql_select_db("test",$conn); 
$sql="insert into receive 
(file_data,file_type,file_name,file_size) 
values ('$file_data','$file_type','$file_name',$file_size)"; 
$result=mysql_query($sql); 
//�������ȡ���˸ղŵ�insert����id 
$id=mysql_insert_id(); 
mysql_close($conn); 
set_time_limit(30); //�ָ�ȱʡ��ʱ���� 
echo "�ϴ��ɹ�--- "; 
echo "<a href='show_info.php?id=$id'>��ʾ�ϴ��ļ���Ϣ</a>"; 
} 
else { 
echo "��û���ϴ��κ��ļ�"; 
} 
?> 