<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Booking</title>
        <link rel="icon" href="/img/baikal.png">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="body">
        <div class="l-wrapper">
            <header class="header">
                <div class="wrapper">
                    <div class="header__buttons">
                        <a class="logo" href="/index/index"><img src="/img/baikal.png" width="100px" height="100px" alt=""></a>
                        <?php  if(!$user) { ?>
                        <div class="header__links">
                            <a href="/user/index" class="btn">Sign In</a>
                            <a href="/user/registration" class="btn">Sign Up</a>
                        </div>
                        <?php } else{ ?>
                        <div class="header_user_exit">
                        <span class="btn"><b>Hello, </b><?= $user['login'];?></span>
                            <img src="/img/bg/hellouser.png" alt="hello user">
                            <a href="/user/exit" class="btn">exit</a>
                        </div>
                        <?php } ?>
                    </div>
                    </div>
            </header>
            <main class="main">
                <?php include_once '../view/pages/' . $page . '_view.php'; ?>
            </main>
            <footer class="footer">
                <div class="wrapper">
                    <div class="footer-top">
                        <div class="footer__logo">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="footer__copyright">
                            <?php echo '© 2023, Level Up jan-2023';?>
                        </div>
                        <div class="footer__created">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>