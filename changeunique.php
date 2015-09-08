<?php
require'config.php';

$query=mysql_query("ALTER TABLE $usertable DROP INDEX EMAIL");
if($query) {
	echo "Update successfull";
	
}
else {
	echo "update failed";
}
?>