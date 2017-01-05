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
    <header><a href="#" onclick="setting(1)">Нозологии</a> / <a href="#" onclick="setting(2)">Мед.обеспечение</a> / Дополнительные материалы </header>

    <?
    $queryadd = $pdo->prepare("SELECT * FROM price WHERE pid=?");
    $queryadd->execute(array('222'));
    $finaladd = $queryadd->fetchAll();
    foreach($finaladd as $row) {

        echo '
    <fieldset>

                                <input id="cod'.$row["id"].'" type="text" name="id" value="' . $row["id"] . '" style="display:none">
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
        <label class="label"> </label>
        <input class="buttonsub" type="button" value="Обновить" onclick="updnoz('.$row["id"].', \'upddop\', 3)">

        </section>
    </fieldset>
        ';
    }
    ?>
    </fieldset>
    <fieldset>
        <section class="sec">
            <label class="label">Название</label>
            <label class="input state-success">
                <input id="newname" type="text" name="name" autocomplete="off">
            </label>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input id="newprice" type="text" name="price" autocomplete="off">
            </label>
        </section>
        <section>
            <label class="label"> </label>
            <input class="buttonsub" type="button" value="Добавить" onclick="addnoz(3)">

        </section>
    </fieldset>
</form>