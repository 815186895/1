<?php
//获取学校工作备忘录接口
//栏目内容列表

	include("dbConnect.php");		//引入数据库链接代码，登录数据库链接
	
	$cname=$_POST['cname'];	//接受签收前端发来的栏目名称

	$num=$_POST['num'];//接受签收前端要求的数量

	

	//到nptice表中查出要求数量的学校工作备忘录
	if ($conn) {
		//编写查询数据指令
		$sqls="select id,title,pubtime from notice where type='{$cname}' order by pubtime desc limit $num";
		//执行指令，获取数据
		$rs=mysqli_query($conn,$sqls);
		//处理数据，转化为可以输出为前端的数据
		if ($rs && mysqli_num_rows($rs)>0) {
			 $rows=mysqli_num_rows($rs);   //计算数据的行数
			 $apps=array();
			 for ($i=0; $i < $rows; $i++) { 
				 $arr=mysqli_fetch_array($rs,MYSQLI_ASSOC);
				 $apps[$i]=$arr;
			 }
			 $json=json_encode($apps,JSON_UNESCAPED_UNICODE); //JSON格式为可输会前端的格式
			 echo $json;	//输送回前端
		}else{
			echo "404";
		}
	}
	




?>