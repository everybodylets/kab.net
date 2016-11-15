<?
require("lib/base.php");
$queryadd = $pdo->prepare("INSERT INTO patients (fname, lname, mname, bdate, passport, addr, city) VALUE (:fname, :lname, :mname, :bdate, :passport, :addr, :city)");
$queryadd->bindValue(":fname", $_POST['fname']);
$queryadd->bindValue(":lname", $_POST['lname']);
$queryadd->bindValue(":mname", $_POST['mname']);
$queryadd->bindValue(":bdate", $_POST['bdate']);
$queryadd->bindValue(":passport", $_POST['passport']);
$queryadd->bindValue(":addr", $_POST['addr']);
$queryadd->bindValue(":city", $_POST['city']);
$queryadd->execute();
$lastid = $pdo->lastInsertId();
$queryaddpolis = $pdo->prepare("INSERT INTO polises (patid, pnumber, startdate, polisdate) VALUE (:patid, :pnumber, :startdate, :polisdate)");
$queryaddpolis->bindValue(":patid", $lastid);
$queryaddpolis->bindValue(":pnumber", $_POST['polis']);
$queryaddpolis->bindValue(":startdate", $_POST['dgosp']);
$queryaddpolis->bindValue(":polisdate", $_POST['polisdate']);
$queryaddpolis->execute();
echo "utry43ty43ty!!!";

?>