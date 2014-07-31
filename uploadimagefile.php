<?php	

header("Content-type: text/html;charset=utf-8");
	
require_once ("conn.php");

if (! isset ( $_POST ['submit'] )) {
	echo "非法访问!";
}
if (! isset ( $_POST ['house'] )) {
	// alert("请输入房屋简介信息");
	echo "请输入房屋简介信息";
}

/*****************************************

Title :文件上传详解
Author:leehui1983(辉老大)
Finish Date   :2006-12-28

*****************************************/

$uploaddir = "./imagefiles/";//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型

//获取文件后缀名函数
function fileext($filename)
{
	return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length)
{
	$hash = 'CR-';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars) - 1;
	mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++)
	{
	$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

	$a=strtolower(fileext($_FILES['myfile']['name']));
	//判断文件类型
	if(!in_array(strtolower(fileext($_FILES['myfile']['name'])),$type))
	{
			$text=implode(",",$type);
			echo "您只能上传以下类型文件: ",$text,"<br>";
	}
			//生成目标文件的文件名
else{
$filename=explode(".",$_FILES['myfile']['name']);
do
{
$filename[0]=random(10); //设置随机数长度
			$name=implode(".",$filename);
			//$name1=$name.".Mcncc";
			$uploadfile=$uploaddir.$name;
			}while(file_exists($uploadfile));

			if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
			 
			if(move_uploaded_file($_FILES['myfile']['tmp_name'],$uploadfile)){
				
				//图片上传成功后就开始将相应的信息写入到数据库中
				$scripttext = $_POST ['house'];
				echo $scripttext;
				
				$dest_file = $_FILES ['myfile'] ['tmp_name'];
				if ($dest_file != "") { // 有了上传文件了
					// 设置超时限制时间,缺省时间为 30秒,设置为0时为不限时
					$time_limit = 60;
					set_time_limit ( $time_limit ); //
					// 把文件内容读到字符串中
					/*$fp = fopen ( $dest_file, "rb" );
					if (! $fp)
						die ( "file open error" );
					$file_data = addslashes ( fread ( $fp, filesize ( $dest_file ) ) );
					fclose ( $fp );
					unlink ( $dest_file );*/
					// 文件格式,名字,大小
					$file_type = $_FILES ['myfile'] ['type'];
					$file_name = $_FILES ['myfile'] ['name'];
					$file_size = $_FILES ['myfile'] ['size'];
				
					// 连接数据库,把文件存到数据库中
					/*
					 * $conn=mysql_connect("127.0.0.1","root","zhuhuiming"); if(!$conn) die("error : mysql connect failed"); mysql_select_db("mydatabase",$conn);
					*/
					$imageurl=$imagepath.$name;
					$sql = "insert into houseimage
					(id,description,filetype,filesize,uploadtime,imageurl)
					values ('','$scripttext','$file_type','$file_size',now(),'$imageurl')";
					$result = mysql_query ( $sql );
					// 下面这句取出了刚才的insert语句的id
					$id = mysql_insert_id ();
					mysql_close ( $conn );
					set_time_limit ( 30 ); // 恢复缺省超时设置
					echo $scripttext."<br>";
					echo "上传成功--- ";
					echo "<a href='show_info.php?id=$id'>显示上传文件信息</a>";
				} else {
					echo "你没有上传任何文件";
				}
					//输出图片预览
				echo "<center>上传图片预览</center><br><center><img src='$uploadfile'></center>";
					echo"<br><center><a href='javascript:history.go(-1)'>继续上传</a></center>";
				}
					else{
					echo "上传失败！";
				}
				}
}

?>