<?php
session_start();


$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];


$_SESSION = array();


session_destroy();


setcookie(session_name(), '', time() - 3600);


if ($is_admin) {
    header("Location: login.php");

} else {  
    header("Location: index.php");
}

exit();
?>
