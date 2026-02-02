<?php
/**
 * 更多列表页的接口（后端程序)
 * 
 */
	include("dbConnect.php");

	$cid=$_POST['cid'];		//获取栏目编号

	$pid=$_POST['pid'];		//当前页码

	$offset=($pid-1)*10;	//查询的起点符

	if($cid=='1'){
		$cname='学校工作备忘录';		//编号转为名称,‘cname’栏目提取‘学校工作备忘录’文件
	}


	if($cid=='2'){
		$cname='学校公告数据';
	}

	if($cid=='3'){
		$cname='部门工作备忘录';
	}

	if($cid=='4'){
		$cname='制度流程数据';
	}

	if($cid=='5'){
		$cname='常用表格数据';
	}
	//以下无需改，只需改上面if数据
	//提取对应的栏目数据
	$sqls="select *	from notice where type='{$cname}' limit {$offset}, 10";		//limit 10 只要十行 如果type='{}'写学校工作备忘录就被写死了

	$rs=mysqli_query($conn,$sqls);		//执行指令，获取数据

	if($rs && mysqli_num_rows($rs)>0){

		$arr=mysqli_fetch_all($rs);		//转为数组格式

		$json=json_encode($arr,JSON_UNESCAPED_UNICODE);	//转为json格式

		echo $json;		//送回前端
	}else{
		echo "none data";
	}

?>