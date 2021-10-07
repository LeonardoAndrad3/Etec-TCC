<?php
include("query.php");
$db = new ControllerDb();
$db->connectDb();

if(isset($_GET['id'])) {
require_once'php/query.php';
$ID = pg_escape_string($_GET['id']);
$postg = "SELECT * FROM chaveiro WHERE id = '$ID' ";
$result = pg_query($postg) ;
$row = pg_fetch_array($result);

} 



?>