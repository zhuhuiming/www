<?php
/*
 * PHP100Job v1.0
 * Programmer : Msn/QQ haowubai@hotmail.com (925939)
 * www.php100.com Develop a project PHP - MySQL - Apache
 * Window 2003 - Preferences - PHPeclipse - PHP - Code Templates
 */
//ͼƬ�Ĵ洢·��
$imagepath="http://127.0.0.1:81/imagefiles/";

$conn = mysql_connect("localhost", "root", "zhuhuiming") or die("���ݿ����Ӵ���");
mysql_select_db("mydatabase", $conn);
mysql_query("set names utf8;"); //ʹ��GBK���ı���;

function htmtocode($content) {
	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
	return $content;
}

//$content=str_replace("'","",$content);
 //htmlspecialchars();

?>
