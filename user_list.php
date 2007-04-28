<?php

include "lib/config.php";
include "lib/database.php";
include "lib/init.php";
include "lib/session.php";


// user list page

print "<h1>Test</h1>";

print "<li>".$_SESSION["login_username"]."</li>\n";

print "<li>".crypt("password","admin")."</li>\n";

?>