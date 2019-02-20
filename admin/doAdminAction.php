<?php
/**
 *Date:2019/2/20
 *Time:15:48
 */

require_once '../include.php';
checkLogin();

$action = $_REQUEST['act'];

switch($action){
    case 'logout' :
        logout();
        break;
}