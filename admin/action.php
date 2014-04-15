<?php 
require("conn.php");
$addtime=date("Y,m,d",time());
$conn=mysql_open(); 


if(isset($_GET['name'])){
	$name = json_encode($_GET['name']);
	$name = json_decode($name);
	$name = str_replace('"', '', $name);
}else{
	$name = '';
}
$tmp = json_encode($_GET['tmp']);
$light = json_encode($_GET['light']);
$open = json_encode($_GET['open']);
$idd = json_encode($_GET['idd']);

$tmp=str_replace('"', '', $tmp);
$light=str_replace('"', '', $light);
$open=str_replace('"', '', $open);
$idd=str_replace('"', '', $idd);

$type = json_encode($_GET['type']);


$callback = $_GET['callback'].'('.json_encode($_GET['type']).')';

// --- --- ///
if($type == '"update"'){
	$sql = 'update current set date="'.$addtime.'",tmp="'.$tmp.'",light="'.$light.'",open="'.$open.'",name="'.$name'" where id = "1"';
	$result=mysql_query($sql);
	echo($callback);
}elseif($type == '"addmode"'){
	$sql= "insert into demo(date,tmp,light,open,name) values('".$addtime."','".$tmp."','".$light."','".$open."','".$name."')";
	$result=mysql_query($sql);
	echo($callback);
	// echo($name);
}elseif($type == '"getcheck"'){
	$sql = mysql_query("select * from current where id = '1'");

	$rs = mysql_fetch_object($sql);
	$json=array("name"=>$rs->name,"tmp"=>$rs->tmp,"light"=>$rs->light,"open"=>$rs->open); 

	$json = $_GET['callback'].'('.json_encode($json).')';
	echo($json);
}elseif($type == '"getall"'){
	$sql = mysql_query("select * from demo");

	while($rs = mysql_fetch_array($sql)){
		$rows[] = $rs;
		// $json=array("name"=>$rs->name,"tmp"=>$rs->tmp,"light"=>$rs->light,"open"=>$rs->open); 
	}
	$json = $_GET['callback'].'('.json_encode($rows).')';
	echo($json);
}elseif($type == '"choose"'){
	$sql = 'update current set date="'.$addtime.'",tmp="'.$tmp.'",light="'.$light.'",open="'.$open.'",name ="'.$name.'" where id = "1"';
	$result=mysql_query($sql);
	echo($callback);
	// echo($sql);
}elseif($type == '"delete"'){
	$sql = 'delete from demo where id = "'.$idd.'"';
	$result=mysql_query($sql);

	$sql2 = mysql_query("select * from demo");
	while($rs = mysql_fetch_array($sql2)){
		$rows[] = $rs;
	}
	$json = $_GET['callback'].'('.json_encode($rows).')';
	echo($json);
}

// echo(123);

exit;

?>