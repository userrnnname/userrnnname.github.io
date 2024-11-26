<?php
require_once('config.php');

session_start();

if(isset($_POST['create'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "INSERT INTO form (email, pass) VALUES (?, ?)";
    $stmtinsert = $db->prepare($sql);
    
    $result = $stmtinsert->execute([$email, $password]);
    if ($result){
        echo '<script>alert("Успешная регистрация!");</script>';
    } else {
        echo '<script>alert("Произошла ошибка при сохранении");</script>';
    }
}

if(isset($_POST['login'])) {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT pass FROM form WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($password === $row['pass']) {
            $_SESSION['user_email'] = $email;
            echo '<script>alert("Успешный вход!");</script>';
        } else {
            echo '<script>alert("Неверный пароль");</script>';
        }
    } else {
        echo '<script>alert("Пользователь не найден");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нерпа-Помощь</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="wrapper">
        <header class="container">
            <span class="logo-text"><a href="index.html">Нерпа Помощь</a></span>
            <nav>
                <ul>
                    <li><a href="#">Мероприятия</a></li>
                    <li><a href="#">Организации</a></li>
                    <li><a href="#">Обсуждения</a></li>
                    <li><a href="#">О нас</a></li>
                    <li class="btn" id="loginButton"><a href="#">Войти</a></li>
                </ul>
            </nav>
        </header>
        <div class="hero container">
            <div class="hero-info">
                <h1>Вместе создаём лучшее будущее!</h1>
                <p>Мы верим, что каждый человек заслуживает шанса на лучшее будущее. Наша команда состоит из профессионалов и волонтёров, которые с искренней заботой подходят к каждому, кто обращается к нам за помощью</p>
                <form action="#"><button class="btn">Я хочу помочь</button></form>
            </div>
            <img src="img/hero.png" alt="">
        </div>
        <div class="container news">
            <div class="text-block">
                <h2>Мероприятия</h2>
                <div class="separator"></div>
                <p>Присоединяйтесь к нашим увлекательным и полезным мероприятиям, где мы вместе, как дружная команда нерпят, будем заботиться о каждом и дарить надежду!</p>
            </div>
            <div class="new">
                <div class="block">
                    <div class="block-image">
                        <a href="#" class="block-link"><img src="img/news1.jpg" alt=""></a>
                    </div>
                    <div class="block-title">
                        <a href="#" class="block-link">Праздник заботы:<br>каждый важен</a>
                    </div>
                </div>
                <div class="block">
                    <div class="block-image">
                        <a href="#" class="block-link"><img src="img/news2.jpg" alt=""></a>
                    </div>
                    <div class="block-title">
                        <a href="#" class="block-link">Светлые души,<br>светлые цели</a>
                    </div>
                </div>
                <div class="block">
                    <div class="block-image">
                        <a href="#" class="block-link"><img src="img/news3.jpg" alt=""></a>
                    </div>
                    <div class="block-title">
                        <a href="#" class="block-link">Доброта в каждом шаге</a>
                    </div>
                </div>
            </div>
            <div class="button-news">
                <a href="#" class="btn">Узнать больше</a>
            </div> 
        </div>
        <div class="container org">
            <div class="text-block">
                <h2>Организации</h2>
                <div class="separator"></div>
                <p>Добро пожаловать в мир заботы и поддержки! Участвуйте в нашем пути к созданию более дружелюбного и заботливого сообщества, где каждый нашел бы своё счастье.</p>
            </div>
            <div class="slider-interface">
                <div class="slider">
                    <div class="slider-item">
                        <a href="#" class="slider-text">Организация "Жизнь и забота"</a>
                        <a href="#" class="slider-link"><img src="img/feed1.jpg" alt=""></a>
                    </div>
                    <div class="slider-item">
                        <a href="#" class="slider-text">Объединение "Тепло сердец"</a>
                        <a href="#" class="slider-link"><img src="img/feed2.jpg" alt=""></a>
                    </div>
                    <div class="slider-item">
                        <a href="#" class="slider-text">Фонд "Поддержка в каждый дом"</a>
                        <a href="#" class="slider-link"><img src="img/feed3.jpg" alt=""></a>
                    </div>
                    <div class="slider-item">
                        <a href="#" class="slider-text">Организация "Рука помощи"</a>
                        <a href="#" class="slider-link"><img src="img/feed4.jpg" alt=""></a>
                    </div>
                </div>
                <div class="interface">
                    <div class="arrows"></div>
                    <div class="dots"></div>
                </div>
            </div>
        </div>       
    <footer>
        <div class="blocks container">
            <div>
                <span class="logo-text">Нерпа Помощь</span>
                <ul class="under logo">
                    <li>Мы верим, что каждый человек заслуживает шанса на лучшее будущее.</li>
                    <li>©АНО «Нерпа Помощь», 2024</li>
                </ul>
            </div>
            <div>
                <h4>Компания</h4>
                <ul>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Свидетельство</a></li>
                    <li><a href="#">Найти специалиста</a></li>
                    <li><a href="#">Приложения</a></li>
                </ul>
            </div>
            <div>
                <h4>Помощь</h4>
                <ul>
                    <li><a href="#">Центр помощи</a></li>
                    <li><a href="#">Связь с поддержкой</a></li>
                    <li><a href="#">Инструкции</a></li>
                    <li><a href="#">Как это работает</a></li>
                </ul>
            </div>
        </div>
    </footer>
    </div>
    <div class="overlay" id="overlay"></div>
    <form method="POST">
        <div class="modal" id="loginModal">
            <h2>Вход</h2>
            <label>Email</label>
            <input type="email" name="loginEmail" required>
            <br>
            <label>Пароль</label>
            <input type="password" name="loginPassword" required>
            <br>
            <button id="loginSubmit" name="login">Войти</button>
            <p>Нет аккаунта? <div class="link" id="toRegister">Зарегистрируйтесь!</div></p>
        </div>
    </form>
    <form method="POST">
        <div class="modal" id="registerModal" method="POST">
            <h2>Регистрация</h2>
            <label>Email</label>
            <input type="email" id="registerEmail" name="email" required>
            <br>
            <label>Пароль</label>
            <input type="password" id="registerPassword" name="pass" required>
            <br>
            <button type="submit" name="create" id="registerSubmit">Зарегистрироваться</button>
            <p>Уже есть аккаунт? <div class="link" id="toLogin">Войдите!</div></p>
        </div>
    </form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>