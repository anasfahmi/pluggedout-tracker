<?php

require_once('smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'c:/Program Files/xampp/htdocs/pluggedout_tracker/templates/';
$smarty->compile_dir = 'c:/Program Files/xampp/htdocs/pluggedout_tracker/templates_c/';
$smarty->config_dir = 'c:/Program Files/xampp/htdocs/pluggedout_tracker/configs/';
$smarty->cache_dir = 'c:/Program Files/xampp/htdocs/pluggedout_tracker/cache/';


$smarty->assign('val',false);
$smarty->assign('name','Ned');

$rows = Array(Array("a","1"),Array("b","2"),Array("c","3"));

$smarty->assign('rows',$rows);

$smarty->display('test.tpl');

include "lib/config.php";

$cfg = new config("config.ini");


include "lib/database.php";

$db = new database();
$con = $db->connect($cfg["server"],$cfg["database"],$cfg["username"],$cfg["password"]);

print "<li>Connection [".$con."]";

$result = $db->query("SELECT * FROM user");

print "<li>Resultset [".count($result)."]";



?>