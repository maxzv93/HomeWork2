
<?php
// page1.php

session_start();

echo 'Добро пожаловать на страницу 1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// Работает, если сессионная cookie принята
echo '<br /><a href="page2.php">page 2</a>';

// Или можно передать идентификатор сессии, если нужно
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>
