<?php
/*常用应用的后端接口*/


include("dbConnect.php");		//引入数据库链接代码

//到apps表中查出全部应用数据
if($conn){
	//编写数据查询指令
	$sqls="select title,icon,url from apps";
	//执行指令，获取数据
	$rs=mysqli_query($conn,$sqls);
	//处理数据，转换可以输回前端的格式
	if($rs && mysqli_num_rows($rs)>0){
		$rows=mysqli_num_rows($rs);     //计算数据的行数
		$apps=array();
		for($i=0;$i<$rows;$i++){
			$arr=mysqli_fetch_array($rs,MYSQLI_ASSOC);
			$apps[$i]=$arr;
		}
		$json=json_encode($apps,JSON_UNESCAPED_UNICODE);  //JSON格式为可输回前端的格式
		echo $json;    //输送回前端
	}else{
		echo '404';
	}




}


?>