<?
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require("lib/base.php");
$client_id = $_GET['id'];

$query = $pdo->prepare("SELECT * FROM patients, polises, oc_t_city, price WHERE patients.id=? AND polises.patid=patients.id AND patients.city=oc_t_city.pk_i_id");
$query->execute(array($client_id));
$final=$query->fetch();
$queryadd = $pdo->prepare("SELECT * FROM price JOIN addprice WHERE polisid=? AND price.id=priceid");
$queryadd->execute(array($final['polises.id']));
$finaladd = $queryadd->fetchAll();

$dir = "uploads/".$client_id;
$files1 = @scandir($dir);
$files = @array_diff($files1, array('.', '..'));
?>
<form class="sky-form-my" id="main-sky-form" action="search.php" method="post" onsubmit="return false;">
        <header><?=$final['lname']." ".$final['fname']." ".$final['mname']; ?></header>

        <fieldset>
            <section class="sec">
                <label class="label">Фамилия</label>
                <label class="input state-success">
                    <input type="text" name="lname" autocomplete="off" value="<?=$final['lname']; ?>">
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
            <input type="text" name="bday" id="datepicker" autocomplete="off" value="<?=$final['bdate']; ?>">
        </label>
        <label class="label">Паспорт</label>
        <label class="input state-success">
            <input type="text" name="passport" autocomplete="off" value="<?=$final['passport']; ?>">
        </label>

    </section>
    <section class="secleft">
        <label class="label">Город</label>
        <label class="input state-success">
            <input type="text" name="city" autocomplete="off" value="<?=$final['s_name']; ?>">
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
            <label class="label">Операция</label>
            <label class="input state-success">
                <input class="long" type="text" name="pricename" autocomplete="off" value="<?=$final['cod']." - ".$final['name']; ?>">
            </label>
        </section>
        <section class="sec">
            <label class="label">Цена</label>
            <label class="input state-success">
                <input type="text" name="price" autocomplete="off" value="<?=$final['price']; ?>">
            </label>
        </section>
        <? foreach($finaladd as $row) {
            $htmladd .= '
            <section style = "clear: both; margin: 0;" ></section >
        <section class="sec" >
            <label class="label" > Дополнительно</label >
            <label class="input state-success" >
                <input class="long" type = "text" name = "pricename" autocomplete = "off" value = "';
        $htmladd .= $row['name'];
        $htmladd .= '">
            </label>
        </section>
        <section class="sec" >
            <label class="label" > Цена</label>
            <label class="input state-success">
                <input type = "text" name = "price" autocomplete = "off" value = "';
        $htmladd .= $row['price'];
        $htmladd .= '" ></label ></section >';}
        echo $htmladd; ?>


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
    </form>
