<?php

// page2.php

session_start();

echo 'Добро пожаловать на страницу 2<br />';

echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// Можете тут использовать идентификатор сессии, как в page1.php
echo '<br /><a href="page1.php">page 1</a>';

