<?php
@require_once("config.php");

$userid = $_GET["userid"];

$str = "select sum(goodsnum) from  myshoppingcar where userid = $userid";

$result = mysql_query($str);

$item = mysql_fetch_array($result);


$obj =array();
$obj["num"]= $item[0];


echo  json_encode($obj);



?>