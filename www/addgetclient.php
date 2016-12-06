<?
header('Content-Type: text/html; charset=utf-8');
require("lib/base.php");
$querypat = $pdo->prepare("INSERT INTO patients (fname, lname, mname, bdate, passport, addr, city, medstory) VALUE (:fname, :lname, :mname, :bdate, :passport, :addr, :city, :medstory)");
$querypat->bindValue(":fname", $_POST['fname']);
$querypat->bindValue(":lname", $_POST['lname']);
$querypat->bindValue(":mname", $_POST['mname']);
$querypat->bindValue(":bdate", $_POST['bdate']);
$querypat->bindValue(":passport", $_POST['passport']);
$querypat->bindValue(":addr", $_POST['addr']);
$querypat->bindValue(":city", $_POST['cityid']);
$querypat->bindValue(":medstory", $_POST['medstory']);

$querypat->execute();
$lastid = $pdo->lastInsertId();
//echo $lastid;
$queryaddpolis = $pds->prepare("INSERT INTO polises (patid, pnumber, startdate, polisdate) VALUE (:patid, :pnumber, :startdate, :polisdate)");
$queryaddpolis->bindValue(":patid", $lastid);
$queryaddpolis->bindValue(":pnumber", $_POST['polis']);
$queryaddpolis->bindValue(":startdate", $_POST['dgosp']);
$queryaddpolis->bindValue(":polisdate", $_POST['polisdate']);
$queryaddpolis->execute();
$lastidPol = $pds->lastInsertId();
$queryadd = $pdo->prepare("INSERT INTO addprice (polisid, noz,op,dop1,dop2,dop3,dop4,dop5) VALUE (?,?,?,?,?,?,?,?)");
$queryadd->bindValue(1, $lastidPol);
$queryadd->bindValue(2, $_POST['noz']);
$queryadd->bindValue(3, $_POST['op']);
$i=4;
foreach ($_POST["categ"] as $value) {
    $queryadd->bindValue($i,$value);
    $i++;
}
for($i; $i<=8;$i++){
    $queryadd->bindValue($i,'NULL');
}
$queryadd->execute();

?>