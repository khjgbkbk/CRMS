<?php
//echo "abc";exit;
header('WWW-Authenticate: Basic realm="My Realm"');
if(isset($_SERVER['PATH_INFO'])){
//echo $_SERVER['PATH_INFO'];

$argv = explode("/",$_SERVER['PATH_INFO']);
}else{
$argv = array();
}
//print_r($argv);
if(isset($argv[1]) && $argv[1] == "logout"){
	header('HTTP/1.1 401 Unauthorized');
	echo "Logout successful";
	exit;
}



if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
	header('HTTP/1.1 401 Unauthorized');
	echo "you can't not pass";
	exit;

}else if( $_SERVER['PHP_AUTH_USER']=="" || $_SERVER['PHP_AUTH_PW']=="" ){
	header('HTTP/1.1 401 Unauthorized');
	echo "you can't not pass2";
	exit;
}else{
	include("../database/fLogin.php");
	$res = funcLogin(array("username" => $_SERVER['PHP_AUTH_USER'] , "password" => $_SERVER['PHP_AUTH_PW']));
	if($res['success'] == false){
		header('HTTP/1.1 401 Unauthorized');
		echo "Forget PW?";
		exit;
	}else{
		//header("HTTP/1.1 200 OK");		
		//echo "welcome my Administrator";
	}
}
switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		if(isset($argv[1])){
			switch($argv[1]){
				case "equipment" :
					getEquipment($argv);
					exit;
				case "location" :
					if(!isset($argv[2]) || $argv[2] == ""){
						include("../database/fBuilding.php");
						$res = funcBuilding();
						if($res['success'] == false){
							header("HTTP/1.1 404 Not Found");
						}else{
							header("HTTP/1.1 200 OK");
							echo json_encode($res["data"]);
						}
						exit;
					}else{
						include("../database/fList.php");
						$res = funcList(array("dorm" => $argv[2]));
						if($res['success'] == false){
							header("HTTP/1.1 404 Not Found");
						}else{
							header("HTTP/1.1 200 OK");
							echo json_encode($res["data"]);
						}
		
					}
			}
		}else{
			header("HTTP/1.1 200 OK");
		}
        exit;
	case 'POST':
		if(isset($argv[1])){
                switch($argv[1]){
                case "equipment" :
                        include("../database/fNew.php");
			if(!isset($_POST['data'])){
				header("HTTP/1.1 400 Bad Request");
				exit;
			}
                        $res = funcNew(json_decode($_POST['data'],true));

                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res);
                        }
                        exit;

                case "putEquipment" :
			  include("../database/fEdit.php");
                        if(!isset($_POST['data'])){
                                print_r($_POST);
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcEdit(json_decode($_POST['data'],true));

                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res);
                        }
                        exit;

		case "user" :
			include("../database/fRegister.php");
                        if(!isset($_POST['data'])){
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcRegister(json_decode($_POST['data'],true));
                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res["data"]);
                        }
                        exit;
                }
                }else{
                        header("HTTP/1.1 400 Bad Request");
                }
	exit;
	case 'DELETE':
		if(isset($argv[1])){
                switch($argv[1]){
                case "equipment" :
                        include("../database/fDelete.php");
                        if(!isset($argv[2])){
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcDelete(array("id" => $argv[2]));
                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res["data"]);
                        }
                        exit;
                case "user" :
			header("HTTP/1.1 501 Not Implemented");
        	exit;
                        include("../database/fRegister.php");
                        if(!isset($_POST['data'])){
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcRegister(json_decode($_POST['data'],true));
                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res["data"]);
                        }
                        exit;
                }
                }else{
                        header("HTTP/1.1 400 Bad Request");
                }

	 case 'PUT':
                if(isset($argv[1])){
                switch($argv[1]){
                case "equipment" :
                        include("../database/fEdit.php");
                        if(!isset($_POST['data'])){
				print_r($_POST);
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcEdit(json_decode($_POST['data'],true));

                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res);
                        }
                        exit;
                case "user" :
               header("HTTP/1.1 501 Not Implemented");
        exit;       

	         include("../database/fRegister.php");
                        if(!isset($_POST['data'])){
                                header("HTTP/1.1 400 Bad Request");
                                exit;
                        }
                        $res = funcRegister(json_decode($_POST['data'],true));
                        if($res['success'] == false){
                                header("HTTP/1.1 404 Not Found");
                        }else{
                                header("HTTP/1.1 200 OK");
                                echo json_encode($res["data"]);
                        }
                        exit;
                }
                }else{
                        header("HTTP/1.1 400 Bad Request");
                }
	exit;
	default:
	header("HTTP/1.1 501 Not Implemented");
	exit;
}

function getEquipment($argv){
	if(!isset($argv[2]) || $argv[2] == ""){
		include("../database/fList.php");
		$res = funcList();
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res["data"]);
		}
		exit;
	}else{
		include("../database/fQuery.php");
		$res = funcQuery(array("id" => $argv[2]));
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res["data"]);
		}
	}


}


?>





