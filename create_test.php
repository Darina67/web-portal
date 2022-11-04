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

  <title>Создать тест</title>
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

    <section class="section testcreate-content">
     <div class="container">
      <div class="content__wrapper">
      <form action="create_test.php" method="post">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="text-center">Добавление теста</h2>
            </div>

            <div class="card-body">
                <div>
                    <label for="title" class="form-label">Название теста</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="mt-5 text-center">
                    <h4>Добавление вопросов</h4>
                </div>
                <div class="questions">
                    <div class="question-items">
                        <div class="mt-4">
                            <label for="question_1" class="form-label">Вопрос #1</label>
                            <input type="text" name="question_1" id="question_1" class="form-control">
                            <div class="answers">
                                <div class="answer-items">
                                    <div>
                                        <label for="answer_text_1_1" class="form-label">Ответ #1</label>
                                        <input type="text" name="answer_text_1_1" id="answer_text_1_1" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <label for="answer_score_1_1" class="form-label">Балл за ответ #1</label>
                                        <input type="text" name="answer_score_1_1" id="answer_score_1_1" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-light border addAnswer" data-question="1" data-answer="1">Добавить вариант ответа</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary addQuestion">Добавить вопрос</button>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <h4>Добавление результатов</h4>
                </div>
                <div class="results">
                    <div class="result-items">
                        <div class="mt-4">
                            <div class="">
                                <label for="result_1" class="form-label">Результат #1</label>
                                <textarea name="result_1" id="result_1" class="form-control"></textarea>
                            </div>
                            <div class="mt-2">
                                <label for="result_score_min_1" class="form-label">Балл (от) #1</label>
                                <input type="text" name="result_score_min_1" id="result_score_min_1" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="result_score_max_1" class="form-label">Балл (до) #1</label>
                                <input type="text" name="result_score_max_1" id="result_score_max_1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary addResult" >Добавить результат</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4 mb-4">
            <div class="card-body text-center">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </div>
    </form>
    </section>
  </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="assets/js/sidebar.js"></script>
  <script src="assets/js/test.js"></script>
</html>