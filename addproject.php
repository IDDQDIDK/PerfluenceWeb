<?php

require_once "db.php";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Perfluence</title>
    <meta refresh="5; index.php">
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

                            $sql = "INSERT INTO `projects` (`Title`, `Specification`, `Company`, `DateStart`, `Duration`) VALUES ('" . $_POST["Title"] . "', '" . $_POST["Specification"] . "', '" . $_COOKIE["ID"] . "', now(), '" . $_POST["Duration"] . "');";
                            $result = mysqli_query($link, $sql); 
                            ?>
                            <h2 id="projects">Добавление проекта успешно! Перейдите на предыдущую страницу, чтобы посмотреть результат!</h2>
                            <? $link = "http://perfluencefin/auth.php?Login=" . $_GET["Login"] . "&Passcode=" . $_GET["Passcode"];
                            header("Location: " . $link)?>

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