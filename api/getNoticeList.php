<?php
// 获取公告标题列表

	include("dbConnect.php");		//引用数据库链接代码
	
	$pid=$_POST['pid'];				//接收前端发来的页码
	
	$cid=$_POST['cid'];				//接收前端发来的分类号

	if($cid=="1"){
		$type="学校工作备忘录";
	}
	if($cid=="5"){
		$type="常用表格";
	}
	
	$startRow=($pid-1)*10;		//计算数据的提取起点
	
	$sqls="select * from notice where type='{$type}' order by pubtime desc limit {$startRow},10";
	
	$rs=mysqli_query($conn,$sqls);
	
	if($rs && mysqli_num_rows($rs)>0){
		$notice=mysqli_fetch_all($rs,MYSQLI_ASSOC);
		$json=json_encode($notice,JSON_UNESCAPED_UNICODE);
		echo $json;
	}else{
		echo '404';
	}


?>