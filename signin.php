<?php
session_start();
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
  <body>
    <header class="header">
      <div class="logo">Тренинг портал</div>
      <div class="nav">
        <a href="#" class="nav-link"></a>
        <a href="#" class="nav-link"></a>
        <a href="#" class="nav-link"></a>
        <a href="#" class="nav-link"></a>
      </div>
      <div class="login">
        <a href="index.html" class="login-button">Главная</a>
      </div>
    </header>
    <section class="section singin">
        <form
        name="form"
        action="/vendor/signin.php"
        class="form-feedback"
        method="post"
      >
      <div class="form__content">
        <label for="form">Авторизация</label>
        <div class="form__group form__group--md">
          <input
            type="email"
            class="form__control"
            placeholder="Ваш Email"
            name="input-email"
            required
          />
          </div>
        <div class="form__group form__group--md">
          <input
            class="form__control form__control--input tel"
            placeholder="Пароль"
            name="input-password"
            type="password"
          ></input>
          </div>
        <div class="form__footer">
          <div class="form__group form__group--md">
             <button
              class="form__btn form__btn-modal"
              type="submit"
              name="submit"
            >
              Войти
            </button>
            <?php
            //здесь будем выводить сообщение из сессии message
            require "vendor/message.php";
            ?>
           </div>
        </div>
      </div>
      </form>
    </section>
  </body>
</html>
