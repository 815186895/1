<?php
/*
*获取登录用户的信息，并返回前端

*/

	session_start();
	include("dbConnect.php");		//引入数据库链接代码
	//到数据库中，查出该登录用户的信息
	$sqls="select user_name,real_name,department,headpic from users where user_name='{$_SESSION['user_name']}'";

	$rs=mysqli_query($conn,$sqls);

	if ($rs && mysqli_num_rows($rs)>0) {
		$user_info=mysqli_fetch_array($rs);		//把用户信息记录转为数组
		$json=json_encode($user_info,JSON_UNESCAPED_UNICODE);			//把用户信息数组转为json字符串

		echo $json;  //把字符串输回前端

	}else{
		echo 404;
	}


?>