<?
header('Content-Type: text/html; charset=utf-8');
require("lib/base.php");
$queryadd = $pdo->prepare("INSERT INTO patients (fname, lname, mname, bdate, passport, addr, city, medstory, temp4, temp5) VALUE (:fname, :lname, :mname, :bdate, :passport, :addr, :city, :medstory, :temp4, :temp5)");
$queryadd->bindValue(":fname", $_POST['fname']);
$queryadd->bindValue(":lname", $_POST['lname']);
$queryadd->bindValue(":mname", $_POST['mname']);
$queryadd->bindValue(":bdate", $_POST['bdate']);
$queryadd->bindValue(":passport", $_POST['passport']);
$queryadd->bindValue(":addr", $_POST['addr']);
$queryadd->bindValue(":city", $_POST['cityid']);
$queryadd->bindValue(":medstory", $_POST['medstory']);
$queryadd->bindValue(":temp4", $_POST['noz']);
$queryadd->bindValue(":temp5", $_POST['op']);
$queryadd->execute();
$lastid = $pdo->lastInsertId();
//echo $lastid;
$queryaddpolis = $pds->prepare("INSERT INTO polises (patid, pnumber, startdate, polisdate) VALUE (:patid, :pnumber, :startdate, :polisdate)");
$queryaddpolis->bindValue(":patid", $lastid);
$queryaddpolis->bindValue(":pnumber", $_POST['polis']);
$queryaddpolis->bindValue(":startdate", $_POST['dgosp']);
$queryaddpolis->bindValue(":polisdate", $_POST['polisdate']);
$queryaddpolis->execute();

foreach ($_POST["categ"] as $value) {
    echo "$value<br>";
}

?>