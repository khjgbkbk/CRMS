<?php
function showMainMenu(){
?>
<li><a STYLE="text-decoration: none" href="?m1=sys&m2=">[使用者列表]</a></li> 
<li><a STYLE="text-decoration: none" href="?m1=sys&m2=">[新增使用者]</a></li> 
<li><a STYLE="text-decoration: none" href="?m1=sys&m2=userEdit">[更改資料]</a></li> 
<?php
}

if(isset($_GET['m2'])){
	switch($_GET['m2']){
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
