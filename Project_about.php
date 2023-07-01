<?php

require_once "db.php";


?>
<!DOCTYPE html>
<html>
<head>
    <?
        $ProjectID = $_GET['ProjectID'];
    ?>
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
            <a class="chevron" href="#">
                <img src="assets/img/chevron.svg" onclick="smoothScroll('#projects')" width="80" alt="scroll">
            </a>
        </div>
    </section>
    <h2 id="projects">Информация о проекте:</h2>
    <div style="background-color: #487346; border-radius:21px; width:90%; padding:10px; margin-left:5%; color: white;">
    <?
        $sql = mysqli_query($link, "SELECT * FROM projects WHERE ID = $ProjectID");
        while ($result = mysqli_fetch_array($sql))
        {
        ?>
            <p>Наименование проекта: <?echo $result["Title"]?></p>
            <p>Описание проекта:</p>
            <p><?echo $result["Specification"]?></p>
            <?$date = date('d.m.Y', strtotime($result["DateStart"]));?>
            <p>Старт проекта: <?echo $date?></p>
            <?php
        }
    ?>
    </div>

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