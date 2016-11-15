<?php
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
header('Content-Type: text/html; charset=utf-8');
//require_once "../pdf/dompdf/autoload.inc.php";
require_once("../pdf/dompdf/dompdf_config.inc.php");
//use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '
    <html><meta http-equiv="content-type" content="text/html; charset=utf-8" /><body>
    <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">ДОГОВІР<br>
СТРАХУВАННЯ МАЙНА N ____<o:p></o:p></span></b></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><b><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>

<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;mso-table-layout-alt:fixed;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt">
 <tbody><tr>
  <td width="286" valign="top" style="width:214.2pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class="MsoNormal"><a name="City"></a><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">м.
  ____</span><span lang="EN-US" style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif;">_____________</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">_<o:p></o:p></span></p>
  </td>
  <td width="286" valign="top" style="width:214.2pt;padding:0cm 5.4pt 0cm 5.4pt">
  <p class="MsoNormal" align="right" style="text-align:right;mso-line-height-alt:
  .95pt"><a name="Date"></a><spanstyle="font-size:8.0pt;mso-bidi-font-size:
  10.0pt;font-family:&quot;Verdana&quot;,sans-serif">&nbsp;"___"</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  "> </span><spanstyle="font-size:8.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________
  200_ р.<o:p></o:p></span></p>
  </td>
 </tr>
</tbody></table>

<p class="MsoNormal" style="margin-left:35.4pt;text-indent:0cm;mso-pagination:
none"><a name="ClientName1"></a><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
________________________________________________________________<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">(вказати
найменування сторони та необхідні відомості про неї)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">(надалі іменується </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">"Страховик") в особі ____________________________________<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">______________________________________________________________________,<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">(вказати посаду,
прізвище, ім\'я, по батькові)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">що діє на підставі
______________________________________________________,&nbsp; <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(вказати:
статуту, довіреності, положення тощо)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">з однієї сторони,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">та<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">___________</span><span style="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
RU;layout-grid-mode:line">__</span><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:
line">_________________________________________________________<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">(вказати
найменування сторони)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">(надалі іменується&nbsp;
</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">"Страхувальник") в особі _______________________________<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">____________________________</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU;layout-grid-mode:line">__</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">________________________________________,<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">(вказати посаду,
прізвище, ім\'я, по батькові)<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">що діє на
підставі _______________________________</span><span style="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
RU;layout-grid-mode:line">_</span><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:
line">______________________,</span><span style="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU;layout-grid-mode:
line"><o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(вказати:
статуту, довіреності, положення тощо)<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line">з іншої сторони, </span><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">(в подальшому
разом іменуються "Сторони", а кожна окремо –
"Сторона")&nbsp; уклали цей Договір
страхування майна </span><span lang="EN-US" style="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;">N</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">
___ (надалі іменується "Договір") про таке. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
layout-grid-mode:line"><o:p>&nbsp;</o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt;tab-stops:36.0pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.</span></b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">
<b><span style="text-transform:uppercase">ЗАГАЛЬНІ
ПОЛОЖЕННЯ<o:p></o:p></span></b></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:0cm 36.0pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.1.</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU"> </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">За цим Договором Страховик
зобов\'язується у разі настання страхового випадку здійснити страхову виплату
Страхувальнику, а Страхувальник зобов\'язується сплачувати страхові платежі у
визначені строки та виконувати інші умови цього Договору. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.2. Предметом цього Договору
(об\'єктом страхування) є: ________________________</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">__________</span><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">____________________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.3. Цей Договір укладений у
відповідності із _________________________<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(вказати
правила страхування) <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">(надалі іменуються "Правила
страхування").<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.4. Страхувальник підтверджує, що він
був належним чином ознайомлений із Правилами страхування та погоджується із
умовами викладеними в них.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
36.0pt 49.65pt"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">1.5. При укладенні цього Договору
Страхувальникові видається ____________________________. <o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><b><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><b><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">2.</span></b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">
<b><span style="text-transform:uppercase">Страхові
випадки<o:p></o:p></span></b></span></p>

<p class="MsoNormal"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">2.1.
    Страховими випадками за цим Договором є:<o:p></o:p></span></p>

<p class="MsoNormal"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase;mso-ansi-language:RU">&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase">2.1.1. ____________________________________.<o:p></o:p></span></p>

<p class="MsoNormal"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase;mso-ansi-language:RU">&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase">2.1.2. ____________________________________.<o:p></o:p></span></p>

<p class="MsoNormal"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase;mso-ansi-language:RU">&nbsp; </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase">2.1.3. ____________________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:0cm;mso-line-height-alt:.95pt;tab-stops:
7.1pt"><b><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;text-transform:
uppercase"><o:p>&nbsp;</o:p></span></b></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm;
mso-line-height-alt:.95pt;tab-stops:7.1pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">3.
<span style="text-transform:uppercase">Страхова сума. Страховий тариф.
Страховий платіж. ФРАНШИЗА<o:p></o:p></span></span></b></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">3.1. Розміри страхових сум, страхових тарифів
та страхових платежів визначаються в додатку </span><span lang="EN-US" style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
">N</span><span style="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU"> _</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">__
до цього Договору.<o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">3.2. Страхувальник сплачує Страховику
страховий платіж, визначений в додатку </span><span lang="EN-US" style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
">N</span><span style="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU"> _</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">__
до цього Договору, шляхом __</span><span style="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">___</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">____________
в строк ____</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">___</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">_____________.<o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">3.3. Франшиза (частина збитку, що не підлягає
відшкодуванню Страхувальнику) визначається у _____________________________ у відсотках
до страхової суми.<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
text-transform:uppercase">4. Права та обов\'язки сторін<o:p></o:p></span></b></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.1.
Страхувальник має право:<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.1.1.
У разі настання будь-якого страхового випадку, визначеного цим Договором,
одержати страхову виплату в межах страхової суми за вирахуванням передбаченої
цим Договором франшизи. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.1.2.
Ознайомлюватися із Правилами страхування та отримувати від Страховика повну й
достовірну інформацію, пов\'язану із цим Договором.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.1.3.
Вимагати від Страховика здійснити страхову виплату в строк ____</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">__________</span><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">____ шляхом __</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">__</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.
    Страхувальник зобов\'язаний:<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.1.
При укладенні цього Договору надати Страховику всю необхідну йому інформацію,
пов\'язану із укладанням цього Договору, зокрема інформацію про всі відомі
Страхувальнику обставини, що мають істотне значення для оцінки страхового
ризику, а також надалі інформувати Страховика про будь-які зміни страхового
ризику.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.2.
При укладенні цього Договору повідомити Страховика про інші договори
страхування, укладені щодо об\'єкта, який страхується за цим Договором.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.3.
Сплачувати страхові платежі в розмірах та в строки, передбачені цим Договором.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.4.
Вживати наступних заходів щодо збереження об\'єкта, який страхується за цим
Договором:</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:RU">&nbsp; </span><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________________</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU"> </span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">__</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.5.
Вживати всіх необхідних заходів щодо запобігання настанню страхових випадків,
визначених в цьому Договорі, та зменшенню ступеню ризиків, зокрема:
______________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.6.
Надати можливість Страховику, якщо останній вважає це доцільним, провести
експертизу стану та умов зберігання та експлуатації об\'єкта, що страхується,
шляхом ____________ в строк __________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.
При настанні страхового випадку: <o:p></o:p></span></p>

<p class="MsoBodyTextIndent3" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.1.
протягом 24 (двадцяти чотирьох) годин з моменту настання страхового випадку, не
враховуючи святкові, неробочі та вихідні дні, повідомити по телефону,
зазначеному в ____________________, Страховика про настання страхового випадку
та отримати інструкції щодо одержання форми Повідомлення про страховий випадок
і її заповнення;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.2.
протягом 48 (сорока восьми) годин з моменту настання страхового випадку, не
враховуючи святкові, неробочі та вихідні дні, надіслати факсом, поштовим
зв\'язком, телеграфом або електронною поштою Страховику належним чином оформлене
Повідомлення про страховий випадок;<o:p></o:p></span></p>

<p class="MsoPlainText" style="text-align:justify;text-indent:36.0pt;mso-line-height-alt:
.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">4.2.7.3. негайно сповістити про страховий
випадок компетентні органи, вимагати від них оформлення та надання документів
щодо встановлення факту, причин та наслідків страхового випадку. Компетентними
органами вважаються:
______________________________________________________________________. <o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.4.
вживати заходів щодо запобігання та зменшення збитків, завданих внаслідок
настання страхового випадку шляхом __________________________;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.5.
зберегти пошкоджений об\'єкт, що страхується, або його частину, що залишилась
непошкодженою та надати представнику Страховика можливість проводити огляд,
обстеження пошкодженого об\'єкта, що страхується, розслідувати причини
страхового випадку та визначати розмір збитків;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.2.7.6.
для отримання страхової виплати протягом 30 (тридцяти) календарних днів подати
Страховику письмову Заяву про сплату страхової виплати із зазначенням обставин
страхового випадку і розміру збитків, а також документи, які підтверджують факт
настання страхового випадку та розмір збитків. У разі неможливості подати Заяву
про сплату страхової виплати у встановлений у цьому пункті строк – письмово
повідомити про причини неподання такої заяви;<o:p></o:p></span></p>

<p class="MsoPlainText" style="text-align:justify;text-indent:36.0pt;mso-line-height-alt:
.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">4.2.7.7. у разі виявлення осіб, винних у
спричиненні збитків, передати представнику Страховика усі документи, що
підтверджують його право вимоги до осіб, винних у спричиненні збитків шляхом
__________________ в строк __________________. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.
    Страховик має право:<o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.1. Перевіряти надану
Страхувальником інформацію стосовно об\'єкта, що страхується, а також перевіряти
умови його експлуатації та зберігання протягом дії цього Договору;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.2.
У разі настання страхового випадку брати участь в огляді та оцінці пошкодженого
об\'єкта, що страхується, шляхом ______________ в строк ______________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.3.
Самостійно з\'ясовувати причини та обставини страхового випадку.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.4.
Відстрочити, відмовити або частково відмовити від здійснення страхової
виплати&nbsp; (її відповідної частини) у
випадках, якщо Страхувальник:<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.1. не повідомив без поважних на те причин
Страховика протягом 48 (сорока восьми) годин про настання страхового випадку
або створив перешкоди у визначенні обставин страхового випадку, характеру і
розміру збитків;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.2. умисно подав завідомо неправдивих відомостей про
предмет цього Договору та об\'єкт, що страхується;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.3. не надав протягом 30 (тридцяти) календарних днів
від дати настання страхового випадку належним чином оформлену Заяву про
здійснення страхової виплати , або в письмовій формі&nbsp; не повідомив про причини неподання цієї
Заяви;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.4. не надав документи, що підтверджують факт
настання страхового випадку та розмір збитків;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.3.4.5. повністю або у відповідній
частині отримав відшкодування збитків від особи, яка їх завдала;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.6. вчинив умисні дії, спрямовані на настання
страхового випадку;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.8. не здійснив заходів, що забезпечують набуття
Страховиком права вимоги до особи, винної у настанні страхового випадку, якщо
така особа була встановлена;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.4.9. в інших випадках, передбачених Правилами страхування
або чинним законодавством.<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.3.5. У випадку, якщо про обставини, визначені пунктом
4.3.5, Страховику стало відомо після здійснення страхової виплати то він має
право вимагати від Страхувальника повернення здійсненої страхової виплати . <o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">4.4. Страховик зобов\'язаний:<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.4.1.
___________________________________________________________;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.4.2.
протягом 2 (двох) робочих днів, як тільки стане відомо про настання страхового
випадку, вжити заходів щодо оформлення всіх необхідних документів для
своєчасного здійснення страхової виплати Страхувальникові та щодо&nbsp; проведення за свій рахунок експертизи для
визначення розміру збитків та складення Страхового акту. Висновки експертизи
мають бути повідомлені Страхувальнику протягом 5 (п\'яти) робочих днів з моменту
їх отримання Страховиком шляхом ________________________. <o:p></o:p></span></p>

<p class="MsoBodyTextIndent" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.4.3.
В строк не пізніше 10 (десяти) робочих днів після отримання від Страхувальника
всіх необхідних документів, що підтверджують факт настання страхового випадку
та розмір збитків, скласти Страховий акт або прийняти рішення про відмову,
часткову відмову або відстрочку, якщо не надані всі документи, у здійсненні
страхової виплати. У разі відмови, часткової відмови або відстрочки у
здійсненні страхової виплати в той же строк письмово повідомити про це Страхувальника
з мотивованим обґрунтуванням причин відмови, часткової відмови або відстрочки.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.4.4.
Протягом 10 (десяти) робочих днів від дати складення Страхового акту здійснити
страхову виплату шляхом ______________;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">4.4.5.
Тримати в таємниці відомості про Страхувальника і його майновий стан, за
винятком випадків, передбачених законодавством України.<o:p></o:p></span></p>

<p class="MsoBodyText2" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:UK"><o:p>&nbsp;</o:p></span></p>

<p class="MsoBodyText2" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">5. ВИЗНАЧЕННЯ РОЗМІРУ СТРАХОВОЇ ВИПЛАТИ ТА<o:p></o:p></span></b></p>

<p class="MsoBodyText2" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:UK">ПОРЯДОК ЇЇ ЗДІЙСНЕННЯ<o:p></o:p></span></b></p>

<p class="MsoBodyText" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:35.45pt 2.0cm 540.0pt"><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">5.1.&nbsp; Страхова виплата здійснюється
Страховиком відповідно до цього Договору, Правил страхування та законодавства
України на підставі заяви Страхувальника та Страхового акту.<o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 2.0cm 517.4pt 540.0pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.2.
    Страхова виплата здійснюється після того, як повністю будуть встановлені
причини та розмір збитків, але не пізніше, ніж через 10 (десять) календарних
днів після складення Страхового акту.<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 2.0cm 540.0pt"><span style="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.3. Розмір страхової виплати розраховується виходячи із фактичного розміру збитків (реальних
збитків), завданих об\'єкту, що страхується, в результаті страхового випадку, на
підставі даних огляду та відновної (дійсної) вартості пошкодженого
(зіпсованого) та (або) знищеного об\'єкта,
що страхується, на дату укладення цього Договору, а також інших
документів, а саме: __________________.<o:p></o:p></span></p>

<p class="MsoPlainText" style="text-align:justify;text-indent:36.0pt;mso-line-height-alt:
.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">5.4. Страхова виплата здійснюється&nbsp; Страховиком на підставі таких документів:<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm left 36.0pt"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">заява Страхувальника з зазначенням
обставин Страхового випадку;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm left 36.0pt"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">Страховий акт;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm left 36.0pt"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">протокол огляду місця страхової події
Страховиком або його представником;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm left 36.0pt"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">акт незалежної експертизи, яка
призначена Страховиком, висновок аварійних комісарів;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">документи компетентних органів, які
підтверджують факт настання Страхового випадку;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">підписаний не менш ніж двома
посадовими особами Страхувальника (для юридичних осіб) перелік всього
втраченого, знищеного (зіпсованого) та пошкодженого майна;<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">відповідні бухгалтерські документи
(виписки з інвентарних книг, рахунки і накладні, виписки з книг складського
обліку тощо);<o:p></o:p></span></p>

<p class="MsoPlainText" style="margin-left:0cm;text-align:justify;text-indent:
36.0pt;mso-line-height-alt:.95pt;mso-list:l0 level1 lfo1;tab-stops:list 0cm"><!--[if !supportLists]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Times New Roman&quot;,serif">-<span style="font-variant-numeric: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">інші документи або відомості, на запит
Страховика, що необхідні для з\'ясування обставин страхового випадку та розміру
збитків.<o:p></o:p></span></p>

<p class="MsoBodyTextIndent2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:35.45pt 2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.5. За цим Договором не підлягають
відшкодуванню будь-які непрямі збитки, в тому числі упущена вигода, моральна
шкода тощо.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 2.0cm 70.9pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.6.
У випадку виникнення спору між Сторонами щодо причин чи розміру збитків
зацікавлена Сторона може за власні кошти організувати та провести відповідну експертизу.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 2.0cm 70.9pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.7.
Рішення про відмову, часткову відмову або відстрочку здійснення страхової
виплати має бути прийняте не пізніше, ніж через 15 (п\'ятнадцять) календарних
днів після того, як Страховиком будуть отримані всі необхідні документи та
повністю будуть встановлені причини та розмір збитків. Відмова у здійсненні
страхової виплати може бути оскаржена Страхувальником у судовому порядку. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 70.9pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">5.8. Після
здійснення страхової виплати, у разі настання страхового випадку, страхова сума
за Договором страхування зменшується на розмір здійсненої страхової виплати.
Фактичний розмір страхової виплати не може перевищувати розміру страхової суми.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
mso-pagination:none;tab-stops:35.45pt 70.9pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;text-indent:36.0pt;
mso-line-height-alt:.95pt"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">6.</span></b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">
<b><span style="text-transform:uppercase">припинення
договору<o:p></o:p></span></b></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.1. Цей Договір припиняється у випадках
визначених цим Договором та чинним в Україні законодавством (ст. 997 Цивільного
кодексу України та ст. 28 Закону України </span><span style="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
RU">"</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">Про страхування</span><span style="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
RU">"</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">).<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2. Дія Договору припиняється за
домовленістю Сторін, а також у разі:<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:1.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2.1. закінчення строку цього Договору;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:1.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2.2. виконання Страховиком обов\'язків перед
Страхувальником у повному обсязі;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:1.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2.3. ліквідації Страхувальника;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:1.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2.4. ліквідації Страховика у порядку,
встановленому чинним законодавством України;<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:1.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif">6.2.5.
____________________________________________;<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:UK">6.2.6.
____________________________________________.<o:p></o:p></span></p>

<p class="MsoBodyText2" style="text-indent:36.0pt;mso-line-height-alt:.95pt;
tab-stops:2.0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:UK">6.3. Цей Договір
страхування також може бути достроково припинений на вимогу Страхувальника або
Страховика в порядку та на умовах, передбачених додатком N ___ до цього
Договору.<o:p></o:p></span></p>

<p class="MsoBodyText" align="center" style="text-align:center;text-indent:36.0pt"><b><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK"><o:p>&nbsp;</o:p></span></b></p>

<p class="MsoBodyText" align="center" style="text-align:center;text-indent:36.0pt"><b><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">7. ВІДПОВІДАЛЬНІСТЬ СТОРІН ЗА ПОРУШЕННЯ ДОГОВОРУ<o:p></o:p></span></b></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">7.1. У випадку порушення зобов\'язання, що виникає з цього Договору (надалі
іменується "порушення Договору"), Сторона несе відповідальність,
визначену цим Договором та (або) чинним в Україні законодавством. <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">7.1.1. Порушенням Договору є його невиконання або неналежне виконання,
тобто виконання з порушенням умов, визначених змістом цього Договору.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">7.1.2. Сторона не несе відповідальності за порушення Договору, якщо воно
сталося не з її вини (умислу чи необережності). <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">7.1.3. Сторона вважається невинуватою і не несе відповідальності за
порушення Договору, якщо вона доведе, що вжила всіх залежних від неї заходів
щодо належного виконання цього Договору.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">7.2.
    Страховик несе таку відповідальність за цим Договором:
______________________________________________________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">7.3.
    Страхувальник несе таку відповідальність за цим Договором: ________</span><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
mso-ansi-language:RU">_</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif">_____________________________________________________________.<o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt;mso-line-height-alt:.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>

<p class="MsoBodyText" align="center" style="text-align:center;text-indent:36.0pt"><b><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">8. ВИРІШЕННЯ СПОРІВ<o:p></o:p></span></b></p>

<p class="MsoNormal" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">8.1. Усі
спори, що виникають з цього Договору або пов\'язані із ним, вирішуються шляхом
переговорів між Сторонами.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">8.2. Якщо відповідний спір не можливо вирішити шляхом переговорів, він
вирішується в судовому порядку за встановленою підвідомчістю та підсудністю
такого спору відповідно до чинного в Україні законодавства.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK"><o:p>&nbsp;</o:p></span></p>

<p class="MsoBodyText" align="center" style="text-align:center;text-indent:36.0pt"><b><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9. ДІЯ ДОГОВОРУ</span></b><spanstyle="font-size:8.0pt;mso-bidi-font-size:
10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:UK"><o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">9.1. Цей
Договір вважається укладеним і набирає чинності з моменту внесення Страхувальником
першого страхового платежу. <o:p></o:p></span></p>

<p class="MsoNormal" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">9.2. Строк
цього Договору починає свій перебіг у момент, визначений у п. 9.1 цього
Договору та закінчується ____________________________________.&nbsp; <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9.3. Закінчення строку цього Договору не звільняє Сторони від відповідальності
за його порушення, яке мало місце під час дії цього Договору. <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9.4. Якщо інше прямо не передбачено цим Договором або чинним в Україні
законодавством, зміни у цей Договір можуть бути внесені тільки за домовленістю
Сторін, яка оформлюється додатковою угодою до цього Договору.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9.5. Зміни у цей Договір набирають чинності з моменту належного оформлення
Сторонами відповідної додаткової угоди до цього Договору, якщо інше не
встановлено у самій додатковій угоді, цьому Договорі або у чинному в Україні законодавстві.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9.6. Якщо інше прямо не передбачено цим Договором або чинним в Україні
законодавством, цей Договір може бути розірваний тільки за домовленістю Сторін,
яка оформлюється додатковою угодою до цього Договору.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">9.7. Цей Договір вважається розірваним з моменту належного оформлення
Сторонами відповідної додаткової угоди до цього Договору, якщо інше не
встановлено у самій додатковій угоді, цьому Договорі або у чинному в Україні
законодавстві.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK"><o:p>&nbsp;</o:p></span></p>

<p class="MsoBodyText" align="center" style="text-align:center;text-indent:36.0pt"><b><spanstyle="font-size:8.0pt;
mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10. ПРИКІНЦЕВІ ПОЛОЖЕННЯ<o:p></o:p></span></b></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10.1. Усі правовідносини, що виникають з цього Договору або пов\'язані із
ним, у тому числі пов\'язані із дійсністю, укладенням, виконанням, зміною та
припиненням цього Договору, тлумаченням його умов, визначенням наслідків
недійсності або порушення Договору, регламентуються цим Договором та
відповідними нормами чинного в Україні законодавства щодо страхування,
Правилами страхування, ____________________, а також застосовними до таких
правовідносин звичаями ділового обороту на підставі принципів добросовісності,
розумності та справедливості.&nbsp; <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10.2. Після підписання цього Договору всі попередні переговори за ним,
листування, попередні договори, протоколи про наміри та будь-які інші усні або
письмові домовленості Сторін з питань, що так чи інакше стосуються цього
Договору, втрачають юридичну силу, але можуть братися до уваги при тлумаченні
умов цього Договору.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10.3. Сторони несуть повну відповідальність за правильність вказаних ними у
цьому Договорі реквізитів та зобов‘язуються своєчасно у письмовій формі
повідомляти іншу Сторону про їх зміну, а у разі неповідомлення несуть ризик
настання пов\'язаних із ним несприятливих наслідків.&nbsp;&nbsp; <o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10.4. Відступлення права вимоги та (або) переведення боргу за цим Договором
однією із Сторін до третіх осіб допускається виключно за умови письмового
погодження цього із іншою Стороною.<o:p></o:p></span></p>

<p class="MsoBodyText" style="text-indent:36.0pt"><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;mso-ansi-language:
UK">10.5. Додаткові угоди та додатки до цього Договору є його невід\'ємними
частинами і мають юридичну силу у разі, якщо вони викладені у письмовій формі,
підписані Сторонами та скріплені їх печатками.<o:p></o:p></span></p>

<p class="MsoBodyTextIndent" style="text-indent:36.0pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">10.6.
Всі виправлення за текстом цього Договору мають силу та можуть братися до уваги
виключно за умови, що вони у кожному окремому випадку датовані, засвідчені
підписами Сторін та скріплені їх печатками. <o:p></o:p></span></p>

<p class="MsoBodyTextIndent" style="text-indent:36.0pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">10.7.
Цей Договір складений при повному розумінні Сторонами його умов та термінології
українською мовою у двох автентичних примірниках, які мають однакову юридичну
силу, – по одному для кожної із Сторін. <o:p></o:p></span></p>

<p class="MsoNormal" style="margin-left:36.0pt;text-indent:36.0pt;mso-pagination:
none"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif;layout-grid-mode:line"><o:p>&nbsp;</o:p></span></p>

<h4 align="center" style="text-align:center;text-indent:36.0pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">МІСЦЕЗНАХОДЖЕННЯ
І РЕКВІЗИТИ СТОРІН<o:p></o:p></span></h4>

<table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;mso-table-layout-alt:fixed;mso-padding-alt:
 0cm 5.4pt 0cm 5.4pt">
 <tbody><tr>
  <td width="292" valign="top" style="width:218.7pt;padding:0cm 5.4pt 0cm 5.4pt">
  <h1><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">СТРАХОВИК<o:p></o:p></span></h1>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <h3 align="center" style="text-align:center;text-indent:0cm;line-height:normal"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext">______________________________</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext;text-transform:uppercase;font-weight:normal"><o:p></o:p></span></h3>
  <h3 style="text-indent:0cm;line-height:normal"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext;text-transform:uppercase;font-weight:normal"><o:p>&nbsp;</o:p></span></h3>
  <h3 align="right" style="text-align:right;text-indent:0cm;line-height:normal"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext;text-transform:uppercase">Підписи<o:p></o:p></span></h3>
  <p class="MsoNormal" style="text-indent:0cm"><spanstyle="font-size:
  8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoNormal" style="text-indent:0cm"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">За <span style="text-transform:uppercase">СТРАХОВИКА</span><o:p></o:p></span></b></p>
  <p class="MsoNormal" style="text-indent:0cm"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">Керівник ______________/_________/<o:p></o:p></span></b></p>
  <p class="MsoBodyText2"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoBodyText2"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">м. п.<o:p></o:p></span></p>
  <p class="MsoNormal" style="text-indent:0cm"><spanstyle="font-size:
  8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="292" valign="top" style="width:218.7pt;padding:0cm 5.4pt 0cm 5.4pt">
  <h1><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">СТРАХУВАЛЬНИК<o:p></o:p></span></h1>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <p class="MsoNormal" align="center" style="text-align:center;text-indent:0cm"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">______________________________<o:p></o:p></span></p>
  <h3 align="center" style="text-align:center;text-indent:0cm;line-height:normal"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext">______________________________</span><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext;text-transform:uppercase;font-weight:normal"><o:p></o:p></span></h3>
  <h3 style="text-indent:0cm;line-height:normal"><span style="font-size:8.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;color:windowtext;
  text-transform:uppercase;mso-ansi-language:RU"><o:p>&nbsp;</o:p></span></h3>
  <h3 style="text-indent:0cm;line-height:normal"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;
  color:windowtext;text-transform:uppercase">сторін<o:p></o:p></span></h3>
  <p class="MsoNormal" style="text-indent:0cm"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>
  <p class="MsoNormal" style="text-indent:0cm"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">За <span style="text-transform:uppercase">СТРАХУВАЛЬНИКА</span><o:p></o:p></span></b></p>
  <h2 align="left"><spanstyle="font-size:8.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif">Керівник
  ___________/_________/<o:p></o:p></span></h2>
  <p class="MsoBodyText2"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>
  <p class="MsoBodyText2"><span style="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif">м. п.<o:p></o:p></span></p>
  <p class="MsoNormal" style="text-indent:0cm"><b><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
  font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></b></p>
  </td>
 </tr>
</tbody></table>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><spanstyle="font-size:8.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Verdana&quot;,sans-serif"><o:p>&nbsp;</o:p></span></p>

<p class="MsoNormal" align="center" style="text-align:center;mso-line-height-alt:
.95pt"><i><spanstyle="font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Verdana&quot;,sans-serif;color:teal">Зразок
договору складено станом на 07.04.2006 р.<o:p></o:p></span></i></p></body></html>
    ';

//echo $html;
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('Brochure1.pdf', $output);
$dompdf->stream("hello.pdf",array('Attachment'=>0));
?>