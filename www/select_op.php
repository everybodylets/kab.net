<?
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require("lib/base.php");
$id = $_GET['id'];
$queryadd = $pdo->prepare("SELECT * FROM price WHERE pid=?");
$queryadd->execute(array($id));
$finaladd = $queryadd->fetchAll();
foreach($finaladd as $row) {
  //  echo '<option value="'.$row['id'].'">'.$row['cod'].' - '.$row['name'].'</option>';
    $result[] = array(
        'id' => $row['id'],
        'name' => $row['name']);
};
echo json_encode($result);
?>