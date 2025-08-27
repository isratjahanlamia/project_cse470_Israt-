<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['outfit_img'])) {
    $img = $_POST['outfit_img'];

    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    if (!in_array($img, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $img;
    }
}


header("Location: outfit.php");
exit;
