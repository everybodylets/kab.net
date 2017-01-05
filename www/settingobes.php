<?
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require("lib/base.php");
$queryadd = $pdo->prepare("SELECT * FROM price WHERE pid=?");
?>
<form class="sky-form-my" id="upd-sky-form" onsubmit="return false;">
    <header><a href="#" onclick="setting(1)">Нозологии</a> / Мед.обеспечение  / <a href="#" onclick="setting(3)">Дополнительные материалы</a> </header>
    <fieldset>
        <section class="sec">
            <label class="label">Нозология</label>
            <label class="select state-success">
                <select class="long" id="selnoz" name="noz">
                    <option value="0">Нозология</option>
                    <?
                    $queryadd->execute(array('0'));
                    $finaladd = $queryadd->fetchAll();
                    foreach($finaladd as $row) {
                        if($row['id'] == 1) {
                            echo '<option selected id="' . $row['price'] . '" value="' . $row['id'] . '">' . $row['cod'] . ' - ' . $row['name'] . '</option>';

                        }
                        else{
                            echo '<option id="' . $row['price'] . '" value="' . $row['id'] . '">' . $row['cod'] . ' - ' . $row['name'] . '</option>';
                        }
                    };
                    ?>
                </select>
            </label>
        </section>
    </fieldset>

    <fieldset id="field">

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
            <input class="buttonsub" type="button" value="Добавить" onclick="addnoz(2)">

        </section>
    </fieldset>

</form>