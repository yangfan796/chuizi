<?php
@require_once("config.php");
$username=$_GET["username"];
$userpwd=$_GET["userpwd"];
$sql="select  count(*)  from  userlist where username ='$username'";
$result=mysql_query($sql);
$item=mysql_fetch_array($result);
$obj=array();
if($item[0]>0){
    $obj["code"]=0;
    $obj["msg"]="用户名已存在";
}else{
    $sql2="INSERT into userlist (username,userpwd,status) VALUES('$username','$userpwd',1)";
    mysql_query($sql2);
    $count=mysql_affected_rows();
    if($count>0){
        $obj["code"]=1;
        $obj["msg"]="新增成功";
    }else{
        $obj["code"]=0;
        $obj["msg"]="新增失败,用户名可能重复";
    }
    
}

echo json_encode($obj);

?>
