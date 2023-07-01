<?php

require_once "db.php";

$scouts = mysqli_fetch_array(mysqli_query($link, "SELECT count(ID) FROM scouts"));
$advertisers = mysqli_fetch_array(mysqli_query($link, "SELECT count(ID) FROM advertisers"));
$bloggers = mysqli_fetch_array(mysqli_query($link, "SELECT count(ID) FROM bloggers"));

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Perfluence</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    <link rel="stylesheet" href="assets/css/lg-transitions.min.css">
</head>
<body>
    <section class="first-screen section-bg">
        <div class="container">
            <div>
                <h1>Perfluence <br> к вашим услугам</h1>
            </div>
            <div>
                <a class="btn btn-bg" onclick="smoothScroll('#about')" href="#">Узнать больше</a>
                <a class="btn btn-outline" onclick="smoothScroll('#projects')" href="#">Наши проекты</a>
            </div>
            <a class="chevron" href="#">
                <img src="assets/img/chevron.png" width="80" alt="scroll">
            </a>
        </div>
    </section>
    <section>
        <div class="container" >
            <h2 id="about">Кто мы?</h2>

            <p>
                №1 ПЛАТФОРМА ДЛЯ ПРОДАЖ ЧЕРЕЗ БЛОГЕРОВ
            </p>
            <p>
                Мы работаем с рекламодателями и блоггерами с одной целью: популяризация лучшего продукта среди лучших блоггеров!
            </p>
            <p>
                Perfluence — платформа по работе с блогерами и инфлюенсерами.
            </p>
            <p>
                Мы – новый канал, который продвигает товары и услуги через тысячи микроблогеров. Наши рекламодатели получают положительную отдачу от вложенных средств.
            </p>
                Сейчас Perfluence:
                <ul>
                    <li><?php print($scouts[0]) ?> блогерских менеджеров,</li>
                    <li><?php print($advertisers[0]) ?> активных клиентов,</li>
                    <li>лучшая рекламная кампания России,</li>
                    <li><?php print($bloggers[0]) ?> блогеров на платформе,</li>
                    <li>2 уникальных перформанс-инфлюенс инструментов.</li>
                </ul>
        </div>
    </section>
    <section class="second-screen section-bg">
        <div class="container">
            <h2 id="projects">Проекты:</h2>
            <div class="gallery">
                <div id="lightgallery" class="gallery">
                    <?php
                    $sql = mysqli_query($link, 'SELECT * FROM advertisers');
                    while ($result = mysqli_fetch_array($sql))
                    {
                    ?>
                    <div>
                    <? error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
                    $Img = base64_encode($result["Logo"]); 
                    ?>
                    <img width="300" src=" data:image/jpeg;base64, <?=$Img ?>" onerror="this.src = 'assets/img/placeholder.png'">
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-bg">
        <div class="container">
            <div class="d-flex">
                <div class="w-60 pr-4">
                    <h2>Давайте работать вместе!</h2>
                    <p>
                        Практический опыт показывает, что запросы от рекламодетелей рассматриваются в течение нескольких часов!
                    </p>
                </div>
                <div class="login-page">
    <div class="form">
      <form class="register-form" action="reg.php" method="GET">
        <h2 style="color: black">Регистрация</h2>
        <input name="Title" type="text" placeholder="Название бренда" required>
                        <input name="Email" type="email" placeholder="Ваш email" required>
                        <input name="Login" type="text" placeholder="Логин" required>
                        <input name="Passcode" type="text" placeholder="Пароль" required>
                        <input class="btn btn-bg" type="submit" value="Подключайтесь!" required>
        <button type="submit">Создать</button>
        <p class="message">Уже с нами? <a href="#">Войти</a></p>
      </form>
      <form class="login-form" action="auth.php" method="GET">
        <h2 style="color: black">Войти</h2>
        <input name="Login" type="text" placeholder="Логин" required />
        <input name="Passcode" type="password" placeholder="Пароль" required/>
        <button type="submit" name="send2">Войти</button>
        <p class="message">Ещё не с нами? <a href="#">Создать аккаунт</a></p>
      </form>
    </div>
  </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            Perfluence &copy; 2023. Все права защищены.
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/main.js"></script>
    <script src="assets/js/lightgallery.min.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));

        function smoothScroll(selector) {
            event.preventDefault();
            document.querySelector(selector).scrollIntoView({
                behavior: 'smooth'
            });
        }
        $('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });
    </script>
</body>
</html>