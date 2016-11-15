<?
session_start();
if(isset($_SESSION['user_id'])){ header('Location: /scal');}
else{
    if(isset($_POST['login']) & isset($_POST['password'])) {
        require "../lib/base.php";
        $res = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS id, login, username, password FROM users WHERE login=?");
        $res->execute(array($_POST['login']));
        $final = $res->fetch();
        if($pdo->query('SELECT FOUND_ROWS();')->fetch(PDO::FETCH_COLUMN) > 0){
            if($_POST['password']==$final['password']){
                $_SESSION['user_id']=$final['id'];
                $_SESSION['username']=$final['username'];
                $_SESSION['authorized']=1;
                header('Location: /scal');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="sky-forms.css">
</head>
<body class="bg-cyan">
<div class="body body-s">

    <form action="index.php" class="sky-form" method="POST">
        <header>Вход</header>

        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-4">Логин</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append icon-user"></i>
                            <input name="login" type="login" autocomplete="off">
                        </label>
                    </div>
                </div>
            </section>

            <section>
                <div class="row">
                    <label class="label col col-4">Пароль</label>
                    <div class="col col-8">
                        <label class="input">
                            <i class="icon-append icon-lock"></i>
                            <input name="password" type="password" autocomplete="off">
                        </label>
<!--                        <div class="note"><a href="#">Forgot password?</a></div>-->
                    </div>
                </div>
            </section>

            <section>
                <div class="row">
                    <div class="col col-4"></div>
                    <div class="col col-8">
<!--                        <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Keep me logged in</label>-->
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            <button type="submit" class="button">Войти</button>
<!--            <a href="#" class="button button-secondary">Register</a>-->
        </footer>
    </form>

</div>
</body>
</html>
