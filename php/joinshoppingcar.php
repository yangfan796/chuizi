<?php
@require_once("config.php");
$userid=$_GET["userid"];
$goodsid=$_GET["goodsid"];
$goodsname=$_GET["goodsname"];
$goodsnum=$_GET["goodsnum"];
$goodsprice=$_GET["goodsprice"];
$goodsimg=$_GET["goodsimg"];
$sql="SELECT count(*) from myshoppingcar where userid=$userid and goodsid=$goodsid";
$result=mysql_query($sql);
$item=mysql_fetch_array($result);
$str="";
if($item[0]>0){
    $str="UPDATE myshoppingcar set goodsnum=goodsnum+$goodsnum WHERE userid=$userid and goodsid=$goodsid;";
}else{
    $str="INSERT INTO myshoppingcar(userid,goodsid,goodsname,goodsnum,goodsprice,goodsimg) VALUES($userid,$goodsid,'$goodsname',$goodsnum,$goodsprice,'$goodsimg')";
}
mysql_query($str);
$count=mysql_affected_rows();
$obj=array();
if($count>0){
    $obj["code"]=1;
    $obj["msg"]="加入成功";
}else{
    $obj["code"]=0;
    $obj["msg"]="加入失败";
}

echo json_encode($obj);
?>