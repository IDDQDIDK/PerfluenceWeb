<?php

require_once "db.php";

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
    <section>
        <div class="container">
            
        </div>
        <div class="gallery">
            <div id="lightgallery" class="gallery">
                <?php 
                        $advertisers = mysqli_fetch_array(mysqli_query($link, "SELECT count(ID) FROM advertisers WHERE `Login` = '" . $_POST["Login"] . "' AND Email = '". $_POST["Email"] . "'"));
                        if ($advertisers[0] == "0")
                        {
                            $sql = "INSERT INTO `sql8622750`.`advertisers` (`Title`, `Email`, `Login`, `Passcode`, `Status`) VALUES ('" . $_POST["Title"] ."', '" . $_POST["Email"] ."', '" . $_POST["Login"] ."', '" . $_POST["Passcode"] ."', 'Работает')";
                            $result = mysqli_query($link, $sql); 
                            ?>
                            <h2 id="projects">Регистрация успешна! Перейдите на предыдущую страницу, чтобы авторизироваться!</h2>
                            <?php
                        }
                        else
                        {
                        ?>
                        <h2 id="projects">Ошибка: логин или email уже используются!</h2>
                        <?php }?>
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
                <div class="w-40">
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            Perfluence &copy; 2023. Все права защищены.
        </div>
    </footer>
    <script src="assets/js/lightgallery.min.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));

        function smoothScroll(selector) {
            event.preventDefault();
            document.querySelector(selector).scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>