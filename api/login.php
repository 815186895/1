<?php
	//接收前端发来的用户名与密码
	session_start(); //打开会话，记录状态。


	$user_name=$_POST['yhm'];
	$user_pw=$_POST['mm'];
	

	include("dbConnect.php");		//引入数据库链接代码
	
	if($conn){
		
		$sqls="select user_name,user_pw from users where user_name='{$user_name}' and user_pw='{$user_pw}'";
		$rs=mysqli_query($conn,$sqls);
		if ($rs && mysqli_num_rows($rs)>0){
			echo '110'; //合法用户
			$_SESSION['user_name']=$user_name;//记录用户的登录状态
			}else{
				echo '404'; //非法用户
			}
	}else{
		echo'数据库服务器无法连接';
	}
?>