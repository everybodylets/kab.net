<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: /login");
    exit;
}
require_once "../lib/base.php";
require_once('../lib/donatj/SimpleCalendar.php');
setlocale(LC_ALL, 'rus');
if(!empty($_GET['time'])){
    $nn=$_GET['time'];
    $mmon = strtotime("-1 month", $nn);
    $nmon = strtotime("+1 month", $nn);
}
else{
    $nn = strtotime(date("Y-m-d"));
    $mmon = strtotime("-1 month", $nn);
    $nmon = strtotime("+1 month", $nn);
}
$first = date("Y-m-01", $nn);
$last = date("Y-m-t", $nn);
$out = '<table cellpadding="0" cellspacing="0" class="SimpleCalendar"><thead><tr>';
$out .= '</tr><tr><th><br /><a onclick="louad(\'' .$mmon. '\')"><<</a><br /></th><th colspan="5">'.iconv("windows-1251", "UTF-8",strftime('%B %Y',$nn)).'</th><th><br /><a onclick="louad(\'' .$nmon. '\')">>></a><br /></th></tr></thead></table>';
echo $out;
$calendar = new donatj\SimpleCalendar();
$calendar->setDate($nn);
$calendar->setStartOfWeek('Monday');
$res = $pdo->prepare("SELECT polises.id, patients.id AS paaid, startdate, lname, fname FROM polises JOIN patients WHERE startdate >= :first AND startdate <= :last AND polises.patid=patients.id");
$res->bindValue(':first', $first);
$res->bindValue(':last', $last);
$res->execute();
$finish = $res->fetchAll();
foreach($finish as $raw){
//    echo $raw['startdate'];
    $calendar->addDailyHtml('<a onClick="load_client('.$raw["paaid"].')">'.$raw["fname"].' '.$raw["lname"].'</a>', $raw['startdate']);
}
$calendar->show(true);
?>

