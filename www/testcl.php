<?
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require("lib/base.php");
$client_id = $_GET['id'];
$count=0;

$query = $pdo->prepare("SELECT *, polises.id as poid, patients.id as paid FROM patients, polises, oc_t_city, price WHERE patients.id=? AND polises.patid=patients.id AND patients.city=oc_t_city.pk_i_id");
$query->execute(array($client_id));
$final=$query->fetch();
$queryadd = $pdo->prepare("SELECT * FROM price WHERE pid=?");
$queryobes = $pdo->prepare("SELECT * FROM price WHERE obes=?");
$addpr = $pds->prepare("SELECT * FROM addprice WHERE polisid=?");
$addpr->execute(array($final['poid']));
$add=$addpr->fetch();


$dir = "uploads/".$client_id;
$files1 = @scandir($dir);
$files = @array_diff($files1, array('.', '..'));
?>
<form class="sky-form-my" id="upd-sky-form" action="search.php" method="post" onsubmit="return false;">
    <header><?=$final['lname']." ".$final['fname']." ".$final['mname']; ?></header>

    <fieldset>
        <section class="sec">
            <label class="label">Фамилия</label>
            <label class="input state-success">
                <input type="text" name="lname" autocomplete="off" value="<?=$final['lname']; ?>">
                <input type="text" name="poid" value="<?=$final['poid']; ?>" style="display: none">
                <input type="text" name="paid" value="<?=$final['paid']; ?>" style="display: none">
                <input type="text" name="addid" value="<?=$add['id']; ?>" style="display: none">
            </label>
        </section>
        <section class="sec">
            <label class="label">Имя</label>
            <label class="input state-success">
                <input type="text" name="fname" autocomplete="off" value="<?=$final['fname']; ?>">
            </label>
        </section>
        <section class="sec">
            <label class="label">Отчество</label>
            <label class="input state-success">
                <input type="text" name="mname" autocomplete="off" value="<?=$final['mname']; ?>">
            </label>
        </section>
    </fieldset>
    <fieldset>
        <section class="secleft">
            <label class="label">Дата рождения</label>
            <label class="input state-success">
                <input type="text" name="bdate" id="datepicker" autocomplete="off" value="<?=$final['bdate']; ?>">
            </label>
            <label class="label">Паспорт</label>
            <label class="input state-success">
                <input type="text" name="passport" autocomplete="off" value="<?=$final['passport']; ?>">
            </label>

        </section>
        <section class="secleft">
            <label class="label">Город</label>
            <label class="input state-success">
                <input id="cityid" type="text" name="cityid" value="<?=$final['pk_i_id']; ?>" style="display: none">
                <input id="city" type="text" name="city" autocomplete="off" value="<?=$final['s_name']; ?>">
                <div class="checkboxescity"></div>
            </label>
            <label class="label">Адрес проживания</label>
            <label class="input state-success">
                <input id="long" type="text" name="addr" autocomplete="off" value="<?=$final['addr']; ?>">
            </label>
        </section>
    </fieldset>
    <fieldset>

        <section class="sec">
            <label class="label">№ полиса</label>
            <label class="input state-success">
                <input type="text" name="polis" autocomplete="off" value="<?=$final['pnumber']; ?>">
            </label>
        </section>
        <section class="sec">
            <label class="label">Дата полиса</label>
            <label class="input state-success">
                <input type="text" name="polisdate" id="datepicker2" autocomplete="off" value="<?=$final['polisdate']; ?>">
            </label>
        </section>
        <section class="sec">
            <label class="label">Распечатать</label>
            <label class="input state-success">
                <input type="button" class="button" value="Договор" onClick="window.open('pdf.php','_blank')"</input>
            </label>
        </section>
        <section class="sec">
            <label class="label">.</label>
            <label class="input state-success">
                <input type="button" class="button" value="Счет" onClick="window.open('pdf.php','_blank')"</input>
            </label>
        </section>
        <section style="clear: both"></section>

        <section class="sec">
            <label class="label">Дата госпитализации</label>
            <label class="input state-success">
                <input  style="float: left" type="text" name="dgosp" id="datepicker3" autocomplete="off" value="<?=$final['startdate']; ?>">
                <? ($final['confirm']=="true") ? $conf='<img style="float: left" width="40px" src="lib/img/confirm.png" title="Подтвержденно!">' : $conf='<img style="float: left" width="40px" src="lib/img/notconfirm.png" title="НЕ Подтвержденно!">';
                echo $conf; ?>

            </label>
        </section>

        <section style="clear: both"></section>
        <section class="sec">
            <label class="label">Нозология</label>
            <label class="select state-success">
                <select class="long" id="selnoz" name="noz">
                    <option value="0">Нозология</option>
                    <?
                    $queryadd->execute(array('0'));
                    $finaladd = $queryadd->fetchAll();
                    foreach($finaladd as $row) {
                        if($row['id'] == $add['noz']) {
                            echo '<option selected id="' . $row['price'] . '" value="' . $row['id'] . '">' . $row['cod'] . ' - ' . $row['name'] . '</option>';
                            $nozprice=$row['price'];
                        }
                        else{
                            echo '<option id="' . $row['price'] . '" value="' . $row['id'] . '">' . $row['cod'] . ' - ' . $row['name'] . '</option>';
                        }
                    };
                    ?>
                </select>
            </label>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" id="cost" value="<?=$nozprice;//number_format((float)$nozprice, 2, '.', ' ');?>">
            </label>
        </section>
        <section style = "clear: both; margin: 0;" ></section >
        <section class="sec" >
            <label class="label">Обеспечение</label>
            <label class="select state-success">
                <select class="long" id="checkboxesOb" name="ob">
                    <option id="OptObes">Обеспечение</option>
                    <?
                    $queryobes->execute(array($add['noz']));
                    $finalobes = $queryobes->fetchAll();
                    foreach($finalobes as $rowob) {
                            echo '<option value="' . $rowob['id'] . '">' . $rowob['name'] . ' - '. $rowob['price'] .'</option>';
                        $costobes += $rowob["price"];
                    };
                    ?>
                </select>
            </label>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" id="costObes" value="<?=$costobes?>">
            </label>
        </section>
        <section style = "clear: both; margin: 0;" ></section >
        <section class="sec" >
            <label class="label">Операция</label>
            <label class="select state-success">
                <select class="long" id="checkboxesOp" name="op">
                    <option id="OptCat">Выберите операцию</option>
                    <?
                    $queryadd->execute(array($add['noz']));
                    $finaladd = $queryadd->fetchAll();
                    foreach($finaladd as $rowop) {
                        if($rowop['id'] == $add['op']) {
                            echo '<option selected value="' . $rowop['id'] . '">' . $rowop['name'] . '</option>';
                        }
                        else{
                            echo '<option value="' . $rowop['id'] . '">' . $rowop['name'] . '</option>';
                        }
                    };
                    ?>
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

                <div id="checkboxesDop" class="checkboxes long">
                    <?
                    $queryadd->execute(array('222'));
                    $finaladd = $queryadd->fetchAll();
                    foreach($finaladd as $rowdop) {
                        if($rowdop['id'] == $add['dop1'] or $rowdop['id'] == $add['dop2'] or $rowdop['id'] == $add['dop3'] or $rowdop['id'] == $add['dop4'] or $rowdop['id'] == $add['dop5']) {
                         echo "<label><input checked class='single-checkbox' type='checkbox' id='".$rowdop['price']."' name='categ[]' value='".$rowdop['id']."' onChange='countDop()'/>".$rowdop['name']." - ".$rowdop['price']."</label>";
                            $fprice = $fprice+$rowdop["price"];
                            $count++;
                        }
                        else{
                        echo "<label><input class='single-checkbox' type='checkbox' id='".$rowdop['price']."' name='categ[]' value='".$rowdop['id']."' onChange='countDop()'/>".$rowdop['name']." - ".$rowdop['price']."</label>";
                        }
                    };
                    ?>
                </div>
                </label>
                <div class="note note-success"><span id="CountCat">Выбрано: <?=$count;?></span></div>
            </div>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" id="costDop" value="<?=number_format((float)$fprice, 2, '.', ' ');?>">
            </label>
        </section>
        <section class="sec">
            <label class="label">Общая сумма</label>
            <label class="input state-success">
                <input disabled type="text" id="costAll">
            </label>
        </section>
    </fieldset>
    <fieldset>
        <section>
            <label class="label">История болезни</label>
            <label class="textarea state-success">
                <textarea name="medstory"><?=$final['medstory']; ?></textarea>
            </label>
            <label class="label">Загрузка файлов</label>
            <label class="inputfiles state-success">
                <input id="loadfiles" type="file" multiple="multiple">
            </label>
            <a class="loadfiles" onclick="loadfiles(<?=$client_id;?>)">Загрузить</a>
            <div class="ajax-respond">
                <?
                if($files<>0) {
                    foreach ($files as $pic) {
                        echo '<a href="uploads/' . $client_id . '/' . iconv("windows-1251", "UTF-8", $pic) . '"><img width="20px" src="lib/img/file3.png">' . iconv("windows-1251", "UTF-8", $pic) . '</a>';
                    }
                }?>
            </div>
        </section>
    </fieldset>
    <fieldset>
        <section>
            <input class="buttonsub" type="submit" name="submit" value="Обновить" onclick="addupdclient()" <? echo ($_SESSION['role']==0 ? '' : 'style="display: none"');?>>
        </section>
    </fieldset>
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