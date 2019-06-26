<?php
@require_once("config.php");
$userid=$_GET["userid"];
$username=$_GET["username"];
$address=$_GET["address"];
$tel=$_GET["tel"];
$zipCode=$_GET["zipCode"];
$sql="INSERT into shippingaddress (userid,username,address,tel,zipCode) VALUES('$userid','$username','$address','$tel','$zipCode')";
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