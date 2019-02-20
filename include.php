<?php
/**
 *Date:2019/2/19
 *Time:16:11
 */

header('Content-type:text/html;Charset=utf-8');
date_default_timezone_set('PRC');
session_start();
define('ROOT',dirname(__FILE__));
set_include_path('.'.PATH_SEPARATOR.ROOT.'/lib'.PATH_SEPARATOR.ROOT.'/core'.PATH_SEPARATOR.ROOT.'/config'.PATH_SEPARATOR.get_include_path());

require_once 'commonFunc.php';
require_once 'stringFunc.php';
require_once 'imageFunc.php';
require_once 'config.php';
require_once 'adminInc.php';
require_once 'mysqlFunc.php';