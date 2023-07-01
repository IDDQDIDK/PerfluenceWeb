<?php

require_once "db.php";


?>
<!DOCTYPE html>
<html>
<head>
    <? $login = $_GET["Login"]; 
    $password = $_GET["Passcode"]?>
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
    <section>
        <?php
        $advertisers = mysqli_fetch_array(mysqli_query($link, "SELECT count(ID) FROM advertisers WHERE `Login` = '" . $_GET["Login"] ."' AND Passcode = '" . $_GET["Passcode"] ."'")); 
        if ($advertisers[0] == "0")
        {
        ?>
        <div class="container">
            <h2 id="projects">Вы ввели неверные логин или пароль!</h2>
        </div>
        <?php } 
        else {?>
        <h2 id="projects">Мои проекты:</h2>
        <div class="gallery">
                <?php
                $advertisers = mysqli_fetch_array(mysqli_query($link, "SELECT ID FROM advertisers WHERE `Login` = '" . $_GET["Login"] ."' AND Passcode = '" . $_GET["Passcode"] ."'")); 
                setcookie("ID", $advertisers[0]);
                 ?>
                <?php
                    $sql = mysqli_query($link, "SELECT projects.ID, projects.Title, Logo FROM projects JOIN advertisers ON Company = advertisers.ID WHERE Company = " . $advertisers[0]);
                    while ($result = mysqli_fetch_array($sql))
                    {
                    ?>
                    <div class="gallery_item" onclick="window.location.href = 'Project_about.php?ProjectID=<?php echo $result['ID']; ?>'">
                    <? error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); 
                    $Img = base64_encode($result["Logo"]); 
                    ?>
                    <img width="300" src=" data:image/jpeg;base64, <?=$Img ?>" onerror="this.src = 'img/placeholder.png'">
                    <p class="projects"><?echo $result["Title"]?></p>
                    </div>
                    <?php
                    }
                    ?>

        </div>
        <?php }?>
    </section>
    <section class="section-bg">
        <div class="container">
            <div class="d-flex">
                <div class="w-60 pr-4">
                    <h2>Добавить новый проект можно здесь!</h2>
                    <p>
                    <form action="addproject.php?Login=<?echo $login?>&Passcode=<?echo $password?>" method = 'post'>
                        <input name="Title" type="text" placeholder="Название проекта">
                        <input name="Specification" type="text" placeholder="Описание проекта">
                        <input name="Duration" type="text" placeholder="Длительность в днях">
                        <input class="btn btn-bg" type="submit" value="Добавить!">
                    </form>
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