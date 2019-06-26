<?php
@require_once("config.php");
$id = $_GET["id"];
$sql = "select  *  from  goodsinfo where  id  =$id";
$result = mysql_query($sql);
//不需要循环 因为id是唯一的  只有一条数据
$item = mysql_fetch_array($result);
$obj  = array();

$obj["id"]=$item["id"];
$obj["goodsname"]= $item["goodsname"];
$obj["goodsdesc"]= $item["goodsdesc"];
$obj["goodsnum"]=$item["goodsnum"];
$obj["goodsprice"]=$item["goodsprice"];
$obj["goodsimg"]=$item["goodsimg"];
$obj["goodsbigimg"]=$item["goodsbigimg"];



echo  json_encode($obj);


?>