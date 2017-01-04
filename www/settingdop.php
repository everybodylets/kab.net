<?
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require("lib/base.php");
?>
<form class="sky-form-my" id="upd-sky-form" onsubmit="return false;">
    <header>Нозологии / <a onclick=""></header>

    <?
    $queryadd = $pdo->prepare("SELECT * FROM price WHERE pid=?");
    $queryadd->execute(array('0'));
    $finaladd = $queryadd->fetchAll();
    foreach($finaladd as $row) {

        echo '
    <fieldset>
        <section class="sec">
                            <label class="label">Код</label>
                            <label class="input state-success">
                                <input id="cod'.$row["id"].'" type="text" name="cod" autocomplete="off" value="' . $row["cod"] . '">
                                <input type="text" name="id" autocomplete="off" value="' . $row["id"] . '" style="display:none">
                            </label>
        </section>
        <section class="sec">
                            <label class="label">Название</label>
                            <label class="input state-success">
                                <input id="name'.$row["id"].'" type="text" name="name" autocomplete="off" value="' . $row["name"] . '">
                            </label>
        </section>
        <section class="sec">
                            <label class="label">Цена</label>
                            <label class="input state-success">
                                <input id="price'.$row["id"].'" type="text" name="price" autocomplete="off" value="' . $row["price"] . '">
                            </label>
        </section>
        <section>
        <input class="buttonsub" type="button" value="Обновить" onclick="updnoz('.$row["id"].')">
        </section>
    </fieldset>
        ';
    }
    ?>
</form>