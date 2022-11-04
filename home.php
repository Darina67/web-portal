<?php
session_start();
require_once './vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="assets/styles/main.css" rel="stylesheet" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Тренинг портал</title>
  </head>
  <body id="body">
  <div class="page" id="page">
    <header class="header header--courses">
      <div class="logo">Тренинг портал</div>
      <div class="login">
        <a href="index.html" class="login-button">Выход</a>
      </div>
    </header>
  <!-- Sidebar -->
  <div class="hamburger-menu">
        <div class="menu__btn"  id="toggle">
          <span></span>
        </div>

        <div class="menu__box" id="menu__box">
          <div class="menu__content">
            <h1>Добро пожаловать, </h1>
            <div class="user__name-data"><?=$_SESSION['user']["name"]?></div>
            <div class="hrefs">
              <div class="hrefs__title">Меню</div>
            </div>
              <ul class="list">
            <li  class="list__item"><a href="home.php">Курсы</a></li>
            <li  class="list__item"><a href="tests.php">Тесты</a></li>
            <?php if($_SESSION['user']['role'] == "admin") {?>
            <li  class="list__item"><a href="create_test.php">Создать тест</a></li>
            <li  class="list__item"><a href="create_course.php">Создать курс</a></li>
            <li  class="list__item"><a href="users.php">Пользователи</a></li>
            <?php }?>
            </ul>
          </div>
        </div>
      </div>

    <div class="mask-content"></div>

          <section class="section content">
            <div class="container">
              <div class="content__wrapper">
                <?php
                    $qr_cards = $connect->prepare("SELECT * FROM `courses`");
                    $qr_cards->execute();
                    $cards = $qr_cards->fetchAll();
                ?>
                <?php
                foreach($cards as $row)
                {
                ?>
                <div class="card">
                  <div class="card__img">
                    <img src="<?=$row['IMG']?>" alt="Курс по ИРК" />
                  </div>
                  <div class="card__info">
                    <div class="card__info-title"><?=$row['TITLE']?></div>
                    <div class="card__info-subtitle">
                    <?=$row['SUBTITLE']?>
                    </div>
                  </div>
                  <div class="card__button">
                    <a href="course.php?id=<?= $row['id']?>" class="card__button">
                      <img src="assets/img/arrow.svg" alt="Курс" /> Перейти к курсу
                    </a>
                  </div>
                </div>
                <?php } ?>
             
              </div>
            </div>
          </section>
      
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/sidebar.js"></script>
  </div>
  </body>
</html>
