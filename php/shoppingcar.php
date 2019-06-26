<?php
@require_once("config.php");
$userid=$_GET["userid"];
$sql="SELECT * from myshoppingcar WHERE userid=$userid";
$result=mysql_query($sql);
$list=array();
while($item=mysql_fetch_array($result)){
    $obj["id"]=$item["id"];
    $obj["goodsid"]=$item["goodsid"];
    $obj["goodsname"]=$item["goodsname"];
    $obj["goodsnum"]=$item["goodsnum"];
    $obj["goodsprice"]=$item["goodsprice"];
    $obj["goodsimg"]=$item["goodsimg"];
    $list[]=$obj;
}
echo json_encode($list);
?>