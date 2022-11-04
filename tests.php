<?php
session_start();
require_once './vendor/connect.php';
$course_id = $_GET['id'];
settype($course_id, 'integer');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link href="assets/styles/main.css" rel="stylesheet" type="text/css" />

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

    <section class="section test-content">
     <div class="container">
      <div class="content__wrapper">
      <?php
      $qr_coursedata = $connect->prepare("SELECT * FROM `tests`");
      $qr_coursedata->execute();
      ?>  
      <?php while($row = $qr_coursedata->fetch()) {  ?>  
        <div class="test">
          <div class="test__title"><?=$row['TITLE']?></div>
          <div class="test__avatar">
            <img src="<?=$row['IMG']?>" alt="Курс">
          </div>
          <div class="test__subtitle">
                <?=$row['SUBTITLE']?>
                <br> 
                <a class="course__info-test" href="tests.php?id=<?=$row['id']?>">Пройти тест</a>
          </div>
      </div>
      <?php } ?>
    </div>
    </section>
  </div>
  </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/js/sidebar.js"></script>
</html>
