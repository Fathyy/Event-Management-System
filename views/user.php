<?php
$userId = (isset($_GET['ID']) && $_GET['ID'] != '') ? $_GET['ID'] : 0;

$usql = "SELECT * FROM users WHERE id = '$userId'";
$res = db_query($usql);
while($row = fetch_assoc($res)) {
    
}
?>