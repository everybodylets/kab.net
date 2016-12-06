<?
header('Content-Type: text/html; charset=utf-8');
require("lib/base.php");
$querypat = $pdo->prepare("UPDATE patients SET fname=?, lname=?, mname=?, bdate=?, passport=?, addr=?, city=?, medstory=? WHERE id=?");
$querypat->bindValue(1, $_POST['fname']);
$querypat->bindValue(2, $_POST['lname']);
$querypat->bindValue(3, $_POST['mname']);
$querypat->bindValue(4, $_POST['bdate']);
$querypat->bindValue(5, $_POST['passport']);
$querypat->bindValue(6, $_POST['addr']);
$querypat->bindValue(7, $_POST['cityid']);
$querypat->bindValue(8, $_POST['medstory']);
$querypat->bindValue(9, $_POST['paid']);
$querypat->execute();

$queryaddpolis = $pds->prepare("UPDATE polises SET pnumber=?, startdate=?, polisdate=? WHERE id=?");
$queryaddpolis->bindValue(1, $_POST['polis']);
$queryaddpolis->bindValue(2, $_POST['dgosp']);
$queryaddpolis->bindValue(3, $_POST['polisdate']);
$queryaddpolis->bindValue(4, $_POST['poid']);
$queryaddpolis->execute();

if(isset($_POST['categ'])){
$queryadd = $pdo->prepare("INSERT INTO addprice (polisid, noz,op,dop1,dop2,dop3,dop4,dop5) VALUE (:polisid,:noz,:op,:dop1,:dop2,:dop3,:dop4,:dop5)ON DUPLICATE KEY UPDATE noz=:noz,op=:op,dop1=:dop1,dop2=:dop2,dop3=:dop3,dop4=:dop4,dop5=:dop5");
    $queryadd->bindValue(":polisid",$_POST['poid']);
$queryadd->bindValue(":noz",$_POST['noz']);
$queryadd->bindValue(":op",$_POST['op']);
$i=3;$c=1;
foreach ($_POST["categ"] as $value) {

    $queryadd->bindValue(":dop".$c,$value);
    $c++;
    $i++;
}
for($i; $i<=7;$i++){
    $queryadd->bindValue(":dop".$c++,'NULL');
}
$queryadd->execute();
}

echo $_POST['paid'];

?>