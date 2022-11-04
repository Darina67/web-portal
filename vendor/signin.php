<?php

        session_start();
        require_once 'connect.php';

        $email = $_POST['input-email'];
        $password = md5($_POST['input-password']);

        $qr_select = $connect->prepare("SELECT * FROM `users` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
        $qr_select->execute();
        if ( $qr_select -> rowCount() > 0) {
            $user = $qr_select->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "name" => $user['name'],
                "email" => $user['email'],
                "role" => $user['role']
            ];
            header('Location: ../home.php');
        } else {
            $_SESSION['message'] = 'Не верный логин или пароль';
            header('Location: ../signin.php');
        }
?>
