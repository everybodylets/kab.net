<?
header('Content-Type: text/html; charset=utf-8');
session_start();
if ($_SESSION['authorized']<>1) {
    header("Location: login");
    exit;
}
require_once 'chat/FbChatMock.php';
$chat = new FbChatMock();
$messages = $chat->getMessages();
?>
<html>
<head>
    <title>СК Альянс-Гарант</title>
    <link rel="icon" href="/logo.png"/>
    <link rel="stylesheet" href="lib/css/SimpleCalendar.css" />
    <link rel="stylesheet" href="lib/css/sky.css" />
    <link rel="stylesheet" href="lib/css/my.css" />
    <link rel="stylesheet" href="chat/core.css" />
    <link rel="stylesheet" href="lib/css/jquery-ui.css" />

    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<div class="head">
<a style="font-size: small; float: right; margin: 10px" onclick="setting(1)">Настройки</a>
</div>
<div class="lpanel">
    <form class="sky-form" id="main-sky-form" action="search.php" method="post" onsubmit="return false;">
        <header id="num">Поиск / <a href="/">Календарь</a></header>

        <fieldset>
            <section>
                <label class="label">Введите фамилию или № полиса</label>
                <label class="input state-success">
                    <input type="text" name="find" id="find" autocomplete="off">
                </label>
            </section>
        </fieldset>
        <fieldset>
            <section>
                <label class="label">
                    <div id="resSearch"></div>
                    </label>
            </section>
        </fieldset>
        <footer>
            <input type="button" class="button" value="Новый клиент" onclick="new_client()" </input>
        </footer>

    </form>
</div>
<div id="rpanel"></div>
<div class="container" style="border: 1px solid lightgray;">
    <div class="msg-wgt-header">
        <a><?=$_SESSION['username']?></a>
    </div>
    <div class="msg-wgt-body" style="display: none">
        <table>
            <?php
            if (!empty($messages)) {
                foreach ($messages as $message) {
                    $msg = htmlentities($message['message'], ENT_NOQUOTES);
                    $user_name = ucfirst($message['username']);
                    $sent = date('F j, Y, g:i a', $message['sent_on']);
                    echo <<<MSG
              <tr class="msg-row-container">
                <td>
                  <div class="msg-row">
                    <div class="avatar"></div>
                    <div class="message">
                      <span class="user-label"><a href="#" style="color: #6D84B4;">{$user_name}</a> <span class="msg-time">{$sent}</span></span><br/>{$msg}
                    </div>
                  </div>
                </td>
              </tr>
MSG;
                }
            } else {
                echo '<span style="margin-left: 25px;">No chat messages available!</span>';
            }
            ?>
        </table>
    </div>
    <div class="msg-wgt-footer" style="display: none">
        <textarea id="chatMsg" placeholder="Type your message. Press shift + Enter to send"></textarea>
    </div>
</div>

</body>
</html>
<script type="text/javascript" src="js/chat.js"></script>
<script type="text/javascript" src="js/newclient.js"></script>
<script type="text/javascript" src="js/loadclient.js"></script>
<script type="text/javascript" src="js/loadfiles.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/sett.js"></script>
<!script type="text/javascript" src="js/findcity.js"><!/script>
<script type="text/javascript">
    function louad(cal){
        if(cal===0){
            $('#rpanel').load('example/basic.php');
        }
        else {
            $('#rpanel').load('example/basic.php?time=' + cal);
        }
    };
    louad(0);

</script>

