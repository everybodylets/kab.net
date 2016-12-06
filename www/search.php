<?php
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
header("Content-type: text/html; charset=UTF-8");
require("lib/base.php");
$search = $_POST['search'];
//$query = $pdo->query("SELECT SQL_CALC_FOUND_ROWS lname, fname, mname, patients.id, polises.pnumber FROM patients JOIN polises ON polis=polises.id WHERE lname LIKE '".$search."%' OR polises.number LIKE '".$search."%' ");

$query = $pdo->query("SELECT SQL_CALC_FOUND_ROWS lname, fname, mname, patients.id, polises.pnumber FROM patients JOIN polises ON patid=patients.id WHERE lname LIKE '".$search."%' OR polises.pnumber LIKE '".$search."%' ");


if($pdo->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN) > 0){
    foreach($query as $raw){
        echo "<div><a onclick='load_client(".$raw['id'].")'>".$raw['lname']." ".$raw['fname']." ".$raw['mname']."</a></div>";}
}else{
    echo "Нет результатов";
}
?>