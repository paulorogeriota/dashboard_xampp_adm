<?php

include ("config.php");
//receber os dados 
$id_project = $_POST['id_project'];
$id_progress = $_POST['id_progress'];
$a = $_POST['a'];

if(!empty($_POST['b'])){ 
	($_POST['b'] == 'on') ? $b = 1 : $b=0;
}else{
	$b = 0;
}

if(!empty($_POST['c'])){ 
	($_POST['c'] == 'on') ? $c = 1 : $c=0;
}else{
	$c = 0;	
}


$d = $_POST['d'];


if($_POST['op'] == "A"){

	$sql = "update progress set 
	item='$a' 
	,concluded=$b 
	,active=$c
	,obs='$d'
	where id = $id_progress ;";
	//echo $sql;
	$stmt = $db->query($sql);

}elseif($_POST['op'] == "I"){
	$sql = "insert into progress (id_project_progress, item, obs )values( $id_project, '$a', '$d');";
	//echo $sql;
	$stmt = $db->query($sql);
	
	
}else{
	echo "<script language=javascript type= 'text/javascript'>window.location.href = 'pop.php?id_project=$id_project'</script>";
	
}

echo "<script language=javascript type= 'text/javascript'>window.location.href = 'pop.php?id_project=$id_project'</script>";

?>

