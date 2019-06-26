<?php
@require_once("config.php");
// $str = "select  *  from  goodsinfo";
$key = $_GET["key"];
$order = $_GET["order"];
$rank = $_GET["rank"];
$skipnum=$_GET["skipnum"];
$shownum=$_GET["shownum"];

$str = "SELECT * from goodsinfo where goodsname like '%$key%' ORDER BY $order  $rank  limit $skipnum,$shownum";

$result = mysql_query($str);

$list = array();

while($item = mysql_fetch_array($result)){
    $obj = array();

    $obj["id"]=$item["id"];
    $obj["goodsname"]=$item["goodsname"];
    $obj["goodsdesc"]=$item["goodsdesc"];
    $obj["goodsnum"]=$item["goodsnum"];
    $obj["goodsprice"]=$item["goodsprice"];
    $obj["goodsimg"]=$item["goodsimg"];
    $list[] = $obj;
}
echo  json_encode($list);

?>