<?
header('Content-Type: text/html; charset=utf-8');
$Month_r = array(
    "01" => "Январь",
    "02" => "Февраль",
    "03" => "Март",
    "04" => "Апрель",
    "05" => "Май",
    "06" => "Июнь",
    "07" => "Июль",
    "08" => "Август",
    "09" => "Сентябрь",
    "10" => "Октябрь",
    "11" => "Ноябрь",
    "12" => "Декабрь");
if(!empty($_POST['all']) && !empty($_POST['comm'])){
    $mon=$_POST['mon'];
    $all = str_replace(',','.',trim($_POST['all']));
    $comm = str_replace(',','.',trim($_POST['comm']/100));
    $perc = $_POST['perc']/100;
    $mon = $_POST['mon'];
    $first = round($all*$perc,2);
    $notall = round($all-$first,2);
    $everymounth = round($notall/$mon,2);
    $message = "<table cellspacing='0'><tr><th>Месяц</th><th>Тело</th><th>Комиссия</th><th>Общий платеж</th></tr><tr>";
    for($j=0;$j<$mon;$j++){
        //$t=$j+1;

        $allplat1 = $allplat1+$everymounth;
        $raz = round($notall-($everymounth*$mon),2);

        if($j==0){$number=31; $daymon= 12; $year=2016;}
        elseif($j>12&&$j<=24){$number = cal_days_in_month(CAL_GREGORIAN, ($j-12), 2018); $daymon=$j-12; $year=2018;}
        elseif($j>24&&$j<=36){$number = cal_days_in_month(CAL_GREGORIAN, ($j-24), 2019); $daymon=$j-24; $year=2019;}
        elseif($j>36){$number = cal_days_in_month(CAL_GREGORIAN, ($j-36), 2020); $daymon=$j-36; $year=2020;}
        else {$number = cal_days_in_month(CAL_GREGORIAN, $j, 2017); $daymon=$j; $year=2017;}
        $days = 365/$number;
        //Формула!!
        //$plat = round(($notall-($everymounth*$j))*$comm/12, 2);
        $plat = round(($notall-($everymounth*$j))*$comm/$days, 2);
        $message .= "<td>".$year." ".$Month_r[date('m',mktime(0,0,0,$daymon))]."</td>";
        $message .= "<td>".number_format(($j==$mon-1)?$everymounth+$raz:$everymounth, 2, ',', ' ')."</td>";
        $message .= "<td>".number_format($plat, 2, ',', ' ')."</td>";
        $allcom = $allcom+$plat;
        $message .= "<td>".number_format(($plat+$everymounth), 2, ',', ' ')."</td>";
        $allplat = $allplat+$plat+$everymounth;
        $message .= "</tr>";
    }
    $message .= "<tr><td>Итого:</td><td>".number_format($allplat1+$raz, 2, ',', ' ')."</td><td>".number_format($allcom, 2, ',', ' ')."</td><td>".number_format($allplat, 2, ',', ' ')."</td></tr></table>";
}
?>
<head xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <title>Калькулятор</title>
    <link href="sky.css" rel="stylesheet" />
</head>
<div>
    <form class="sky-form" method="post">
        <header>Калькулятор</header>
        <fieldset>
            <section>
                <label class="label">Общая сумма</label>
                <label class="input state-success">
                    <input type="text" name="all" value="<?=$all?>">
                </label>
            </section>
            <section>
                <label class="label">Предоплата (%)</label>
                <label class="input state-success">
                    <input type="text" name="perc" value="<?=$perc*100?>">
                </label>
            </section>
            <section>
                <label class="label">Годовой процент (комиссия)</label>
                <label class="input state-success">
                    <input type="text" name="comm" value="<?=$comm*100?>">
                </label>
            </section>
            <section>
                <label class="label">Срок (месяцев)</label>
                <label class="input state-success">
                    <input type="text" name="mon" value="<?=$mon?>">
                </label>
            </section>
        </fieldset>
        <footer>
            <input type="submit" class="button" value="Рассчитать"</input>
        </footer>
    </form>
    <?
    echo "Первый платеж: <b>".number_format($first, 2, ',', ' ')." грн </b><br />".$message;
    ?>
</div>