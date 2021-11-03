<?php
include_once("query.php");
$db = new ControllerDb();
$db->connectDb();

if(isset($_GET['id'])) {
$idC = pg_escape_string($_GET['id']);
$postg = "SELECT * FROM chaveiro WHERE id = '$idC' ";
$result = pg_query($postg) ;
$row = pg_fetch_array($result);

} 

?>