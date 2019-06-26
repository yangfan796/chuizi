<?php
@require_once("config.php");

$username = $_GET["username"];
$userpwd  = $_GET["userpwd"];

$str = "select * from  userlist where  username = '$username'";

$result  = mysql_query($str);

$item  = mysql_fetch_array($result); 

$obj  = array();
if($item){ 
 $existPwd = $item["userpwd"];
 if($existPwd == $userpwd){
    $obj["code"]=1;
    $obj["msg"]="登录成功";
    $obj["userid"] = $item["id"];
 }else{
     $obj["code"] =0;
     $obj["msg"]="用户名和密码不匹配";
 }

}else{
    $obj["code"]=0;
    $obj["msg"]="用户名或者手机号不存在";
}

echo  json_encode($obj);


?>