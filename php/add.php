<?php
@require_once("config.php");
$goodsnum=$_GET["goodsnum"];
$id=$_GET["id"];
$sql="UPDATE myshoppingcar set goodsnum=$goodsnum WHERE id=$id";
mysql_query($sql);
$count=mysql_affected_rows();
$obj=array();
if($count>0){
    $obj["code"]=1;
    $obj["msg"]="修改成功";
}else{
    $obj["code"]=0;
    $obj["msg"]="修改失败";
}
echo json_encode($obj);
?>