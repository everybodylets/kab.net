<?php
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
header('Content-Type: text/html; charset=utf-8');
//require_once "pdf/dompdf/autoload.inc.php";
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
';

//echo $html;
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('Brochure1.pdf', $output);
$dompdf->stream("hello.pdf",array('Attachment'=>0));
?>