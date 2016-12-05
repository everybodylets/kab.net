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
<form class="sky-form-my" id="client-sky-form" action="search.php" method="post" onsubmit="return false;">
    <header>Новый</header>

    <fieldset>
        <section class="sec">
            <label class="label">Фамилия</label>
            <label class="input state-success">
                <input type="text" name="lname" autocomplete="off">
            </label>
        </section>
        <section class="sec">
            <label class="label">Имя</label>
            <label class="input state-success">
                <input type="text" name="fname" autocomplete="off">
            </label>
        </section>
        <section class="sec">
            <label class="label">Отчество</label>
            <label class="input state-success">
                <input type="text" name="mname" autocomplete="off">
            </label>
        </section>
    </fieldset>
    <fieldset>
        <section class="secleft">
            <label class="label">Дата рождения</label>
            <label class="input state-success">
                <input type="text" name="bdate" id="datepicker" autocomplete="off"">
            </label>
            <label class="label">Паспорт</label>
            <label class="input state-success">
                <input type="text" name="passport" autocomplete="off">
            </label>

        </section>
        <section class="secleft">
            <label class="label">Город</label>
            <label class="input state-success">
                <input id="cityid" type="text" name="cityid" style="display: none">
                <input id="city" type="text" name="city" autocomplete="off">
                <div class="checkboxescity"></div>
            </label>
            <label class="label">Адрес проживания</label>
            <label class="input state-success">
                <input id="long" type="text" name="addr" autocomplete="off">
            </label>
        </section>
    </fieldset>
    <fieldset>

        <section class="sec">
            <label class="label">№ полиса</label>
            <label class="input state-success">
                <input type="text" name="polis" autocomplete="off">
            </label>
        </section>
        <section class="sec">
            <label class="label">Дата полиса</label>
            <label class="input state-success">
                <input type="text" name="polisdate" id="datepicker2" autocomplete="off">
            </label>
        </section>
        <section style="clear: both"></section>

        <section class="sec">
            <label class="label">Дата госпитализации</label>
            <label class="input state-success">
                <input  style="float: left" type="text" name="dgosp" id="datepicker3" autocomplete="off">
                <? //($final['confirm']=="true") ? $conf='<img style="float: left" width="40px" src="lib/img/confirm.png" title="Подтвержденно!">' : $conf='<img style="float: left" width="40px" src="lib/img/notconfirm.png" title="НЕ Подтвержденно!">';
                //echo $conf; ?>

            </label>
        </section>

        <section style="clear: both"></section>
        <section class="sec">
            <label class="label">Нозология</label>
            <label class="select state-success">
                <select class="long" id="selnoz" name="noz">
                    <option value="0" selected disabled>Нозология</option>
                    <?
                    $queryadd->execute(array('0'));
                    $finaladd = $queryadd->fetchAll();
                    foreach($finaladd as $row) {
                        echo '<option id="'.$row['price'].'" value="'.$row['id'].'">'.$row['cod'].' - '.$row['name'].'</option>';
                    };
                    ?>
                </select>
            </label>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" id="cost">
            </label>
        </section>
        <section style = "clear: both; margin: 0;" ></section >
        <section class="sec" >
            <label class="label">Операция</label>
                    <label class="select state-success">
                        <select class="long" id="checkboxesOp" name="op">
                            <option id="OptCat" selected disabled>Выберите операцию</option>
                        </select>
                    </label>
        </section>
        <section style = "clear: both; margin: 0;" ></section >
        <section class="sec" >
            <label class="label">Дополнения</label>
                        <div class="multiselect">
                            <div class="selectBox" onclick="showCheckboxesCat()">
            <label class="select state-success">
                <select class="long" id="checkboxes">
                    <option id="OptDop" >Выберите дополнения</option>
                </select>
            </label>
                                <div class="overSelect"></div>
                            </div>

                            <div id="checkboxesDop" class="checkboxes long"></div>
                            </label>
                            <div class="note note-success"><span id="CountCat">Выбрано: 0</span></div>
                        </div>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" id="costDop">
            </label>
        </section>


    </fieldset>
    <fieldset>
        <section>
            <label class="label">История болезни</label>
            <label class="textarea state-success">
                <textarea name="medstory"></textarea>
            </label>
        </section>
    </fieldset>
    <fieldset><section>
    <input class="buttonsub" type="submit" name="submit" value="Добавить" onclick="addgetclient()">
        </section></fieldset>
</form>
<div id="msg"></div>
<script>
    $(function () {
        $("#city").keyup(function () {
            var search = $("#city").val();
            if (search.length > 3) {
                $.ajax({
                    type: "POST",
                    url: "searchcity.php",
                    data: {"search": search},
                    cache: false,
                    success: function (response) {
                        $(".checkboxescity").show();
                        $(".checkboxescity").html(response);
                        $(".city_s").click(function () {
                            $("#cityid").val($(this).attr("id"));
                            $("#city").val($(this).text());
                            $(".checkboxescity").hide();
                        });

                    }
                });
            }
            else {
                $(".checkboxescity").html('');

            }
        });

    })


</script>
