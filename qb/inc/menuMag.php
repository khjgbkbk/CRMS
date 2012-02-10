<?php
function showMainMenu(){
?>
<li><a STYLE="text-decoration: none" href="?m1=mng&m2=equivList">[器材列表]</a></li>
<li><a STYLE="text-decoration: none" href="?m1=mng&m2=addequiv">[新增器材]</a></li>
<li><a STYLE="text-decoration: none" href="?m1=mng&m2=equiQuery">[查詢器材]</a></li>
<?php
}

if(isset($_GET['m2'])){
	switch($_GET['m1']){
	case 'equiQuery':
		include('inc/equiQuery.php');
		break;	
	case 'addequiv':
		include('inc/addequiv.php');
		break;
	case 'equivList':
	default:
		include('inc/equivList.php'); 
		break;
	}					
}else{
	include('inc/equivList.php'); 

}


?>
