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
echo $_POST['lname'];
?>