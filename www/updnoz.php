<?
header('Content-Type: text/html; charset=utf-8');
require("lib/base.php");
$querypat = $pdo->prepare("UPDATE price SET name=:name, cod=:cod, price=:price WHERE id=:id");
$querypat->bindValue(':id', $_POST['id']);
$querypat->bindValue(':cod', $_POST['cod']);
$querypat->bindValue(':name', $_POST['name']);
$querypat->bindValue(':price', $_POST['price']);
$querypat->execute();
echo $_POST['price'];
?>