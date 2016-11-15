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

$query = $pdo->query("SELECT SQL_CALC_FOUND_ROWS oc_t_city.pk_i_id AS id, oc_t_city.s_name AS city, oc_t_region.s_name AS regi
FROM oc_t_city
JOIN oc_t_region ON ( fk_i_region_id = oc_t_region.pk_i_id )
WHERE oc_t_city.s_name LIKE '".$search."%' LIMIT 0 , 5");


if($pdo->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN) > 0) {
    foreach ($query as $raw) {
        echo "<div class='city_s'>" . $raw['regi'] . " " . $raw['city'] . "<span class='city_id' style='display: none'>".$raw['id']."</span></div>";
    };
}
else{
        echo "Нет результатов";
    };
?>