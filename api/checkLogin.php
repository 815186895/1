<?php
//检查用户登录状态:后端接口
//
	session_start();

	if (isset($_SESSION['user_name']) && $_SESSION['user_name']!=''){
		echo "101";
	}else{
		echo "404";
	}

?>