<?php
/*
数据库链接

*/

	$dbserver='127.0.0.1';  //数据库地址
	$dbuser='root';   //数据库账号
	$dbping='root';   //数据库密码
	$dbname='hzcc_oa'; //数据库名称
	
	$conn=mysqli_connect($dbserver,$dbuser,$dbping);
	if($conn){
		mysqli_select_db($conn,$dbname);//打开数据库
	}else{
		return;
	}


?>