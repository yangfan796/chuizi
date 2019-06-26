<?php
@require_once("config.php");
// $str = "select  *  from  goodsinfo";
$userid = $_GET["userid"];


$str = "SELECT * from shippingaddress where userid=$userid";

$result = mysql_query($str);

$list = array();

while($item = mysql_fetch_array($result)){
    $obj = array();

    $obj["address"]=$item["address"];
    $obj["username"]=$item["username"];
    $list[] = $obj;
}
echo  json_encode($list);

?>