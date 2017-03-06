<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "testing");

$result = $conn->query("SELECT first_name, last_name, id FROM table_user");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"fname":"'  . $rs["first_name"] . '",';
    $outp .= '"id" : "' . $rs["id"] . '",';

    $outp .= '"lname":"'. $rs["last_name"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>