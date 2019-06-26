<?php
@require_once("config.php");
$key = $_GET["key"];
$sql = "select  count(*)  from  goodsinfo where  goodsname  like '%$key%' ";

$result = mysql_query($sql);

$item = mysql_fetch_array($result);

$obj = array();

$obj["count"] = $item[0];
echo  json_encode($obj);

?>