<?php
/**
 *Date:2019/2/20
 *Time:15:48
 */

require_once '../include.php';
checkLogin();

$action = $_REQUEST['act'];
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
switch($action){
    case 'logout' :
        logout();
        break;
    case 'addAdmin':
    	$mes = addAdmin();
    	break;
    case 'editAdmin':
    	$mes = editAdmin($id);
    	break;
    case 'delAdmin':
    	$mes = delAdmin($id);
    	break;
}

?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>慕课商城</title>
</head>
<body>
<?php
	if($mes){
		echo $mes;
	}
?>
</body>
</html>