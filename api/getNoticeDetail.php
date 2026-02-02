<?php

    $id=$_POST['id'];

   include("dbConnect.php");

   $sqls="select * from notice where id={$id}";

   $rs=mysqli_query($conn,$sqls);

   $notice=mysqli_fetch_array($rs,MYSQLI_ASSOC);

   $notice=json_encode($notice,JSON_UNESCAPED_UNICODE);

   echo $notice; 


?>